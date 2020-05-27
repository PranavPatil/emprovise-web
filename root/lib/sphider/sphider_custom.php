<?php

	include "../../../lib/xmlparser/xmlparser_php5.php";
	error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

    // Functions defined for Subpage operations    
	function is_url_subpage_enabled($url) {
		
		global $subpagelinks;
		$matchkey = NULL;
		
		foreach ($subpagelinks as $key => $value) {
			
			if (strpos($url,$key) != false) {
				$matchkey = $key;
				break;
			}
		}
		
		return $matchkey;
	}
	
	function getsubpage_array($filedata, $subpageKey) {
		
		global $subpagelinks;
		
		$dom = new DOMDocument();
		$dom->loadHTML($filedata);
	
		$xpath = new DOMXPath($dom);
		$tags = $xpath->query($subpagelinks[$subpageKey]);
	
		$mainlist = array();
		$count = 0;
	
		foreach ($tags as $tag) {
		
			$value = converttext($tag->textContent);
			$mainlist[$count] = $value;
			$count++;
		}
	
		return $mainlist;
	}
        
	function converttext($file) {
	
		//create spaces between tags, so that removing tags doesnt concatenate strings
		$file = preg_replace("/<[\w ]+>/", "\\0 ", $file);
		$file = preg_replace("/<\/[\w ]+>/", "\\0 ", $file);
		$file = strip_tags($file);
		$file = preg_replace("/&nbsp;/", " ", $file);
	
		//replace codes with ascii chars
		$file = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $file);
		$file = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $file);
		$file = strtolower($file);
		
		reset($entities);    
		while ($char = each($entities)) {
			$file = preg_replace("/".$char[0]."/i", $char[1], $file);
		}
		
		$file = preg_replace("/&[a-z]{1,6};/", " ", $file);
		$file = preg_replace("/[\*\^\+\?\\\.\[\]\^\$\|\{\)\(\}~!\"\/@#?$%&=`?;><:,]+/", " ", $file);
		$file = preg_replace("/\s+/", " ", $file);
		$data = addslashes($file);
		
		return $data;
	}
	
	function addsubpage($link_id, $subpage_id, $subtext, $operation) {
	
		global $mysql_table_prefix;
		$exists = 0;
		
		$query = "select count(link_id) from ".$mysql_table_prefix."link_subpages where link_id=$link_id and subpage_id=$subpage_id";
		$result = mysql_query($query);
		echo mysql_error();
		$row = mysql_fetch_row($result);
		$exists = $row[0];   
	
		if($operation == "ADD" && $exists == 0) {
	
			$query = "insert into ".$mysql_table_prefix."link_subpages (link_id, subpage_id, subpagetxt) values ($link_id, $subpage_id, '$subtext')";
			mysql_query ($query);
			echo mysql_error();
		}
		else if ($operation == "UPDATE" && $exists == 1) {
		
			$query = "update ".$mysql_table_prefix."link_subpages set subpagetxt='$subtext' where link_id=$link_id and subpage_id=$subpage_id";
			mysql_query ($query);
			echo mysql_error();
		}
	}

	function addurl ($siteurl, $link, $desc, $title, $pagelevel) {

		global $mysql_table_prefix;
		$command_line = 1;
		
		$result = mysql_query("select site_id from ".$mysql_table_prefix."sites where url='$siteurl'");
		echo mysql_error();
			
		if (!$result || mysql_num_rows($result) < 1) {
			return;
		}
		
		$row = mysql_fetch_row($result);
		$site_id = $row[0];
		
		$desc = addslashes($desc);
		$fulltxt = $desc;
		$wordarray = unique_array(explode(" ", (strtolower($desc))));
		$newmd5sum = md5($desc);
		
		$pageSize = number_format(strlen($desc)/1024, 2, ".", "");
		$thislevel = $pagelevel + 1;
		
		$domain_for_db = $_SERVER['HTTP_HOST'];
		$url = "http://" . $domain_for_db . $link;
		$domain_arr = get_domains();
			
		if (isset($domain_arr[$domain_for_db])) {
			$dom_id = $domain_arr[$domain_for_db];
		} 
		else {
			mysql_query("insert into ".$mysql_table_prefix."domains (domain) values ('$domain_for_db')");
			$dom_id = mysql_insert_id();
			$domain_arr[$domain_for_db] = $dom_id;
		}
		
		if (is_array($wordarray)) {
			
			$result = mysql_query("select link_id from ".$mysql_table_prefix."links where url='$url'");
			echo mysql_error();
			
			if (!$result || mysql_num_rows($result) < 1) {
				
				mysql_query ("insert into ".$mysql_table_prefix."links (site_id, url, title, description, fulltxt, indexdate, size, 
					md5sum, level) values ('$site_id', '$url', '$title', '$desc', '$fulltxt', curdate(), '$pageSize', '$newmd5sum', 
					$thislevel)");   
				echo mysql_error();
				$result = mysql_query("select link_id from ".$mysql_table_prefix."links where url='$url'");
				echo mysql_error();
				$row = mysql_fetch_row($result);
				$link_id = $row[0];
				
				save_keywords($wordarray, $link_id, $dom_id);
//				printStandardReport('indexed', $command_line);
		
			}
			else {
				$row = mysql_fetch_row($result);
				$link_id = $row[0];
				
				for ($i=0;$i<=15; $i++) {
					$char = dechex($i);
					mysql_query ("delete from ".$mysql_table_prefix."link_keyword$char where link_id=$link_id");
					echo mysql_error();
				}
				save_keywords($wordarray, $link_id, $dom_id);
				$query = "update ".$mysql_table_prefix."links set title='$title', description ='$desc', fulltxt = '$fulltxt', indexdate=now(), size = '$pageSize', md5sum='$newmd5sum', level=$thislevel where link_id=$link_id";
				mysql_query($query);
				echo mysql_error();
//				printStandardReport('re-indexed', $command_line);
			}      
		}
	}

	function getmiddle_string($string, $start, $end){
		$string = " ".$string;
		$pos = strpos($string,$start);
		if ($pos == 0) return "";
		$pos += strlen($start);
		$len = strpos($string,$end,$pos) - $pos;
		return substr($string,$pos,$len);
	}

	function scanplaylist($playlistpath) {
    
		//Get the XML document loaded into a variable
		$xml = file_get_contents($playlistpath);
		//Set up the parser object
		$parser = new XMLParser($xml);
		
		//parse the xml play list
		$parser->Parse();
   
		$playlistlevel = 2;
		$host = "http://". $_SERVER['HTTP_HOST'] ."/";
		$urlprefix = null;
		
		if (strpos($playlistpath,'video')) {
			$urlprefix = "/video.php?tkid=";
			$title = "Music Video";
			$type = "VIDEO";
		}
		else if (strpos($playlistpath,'audio')) {
			$playlistid = getmiddle_string($playlistpath, "tracklist", ".xml");
			if($playlistid < 1) {
				echo "<br /> Invalid Track Playlist Number";
				return;
			}
			
			$urlprefix = "/music.php?tkid=lt" . ($playlistid-1) . "tk";
			$title = "Music Audio";
			$type = "AUDIO";
		}
		else {
			echo "<br /> Invalid Directory path";
			return;
		}
		
		$trackid = 0;
		
		foreach($parser->document->track as $track) {
		
			$desc = $track->title[0]->tagData . ": " . $track->artist[0]->tagData;
			$trackurl = $urlprefix . $trackid;
			addurl($host, $trackurl, $desc, $title, $playlistlevel);
			$trackid++;
		}
	}

?>