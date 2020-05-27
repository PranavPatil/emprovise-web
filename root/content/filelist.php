
<?php

# Original PHP code by Chirp Internet: www.chirp.com.au
  # Please acknowledge use of this code by including this header.

  function getFileList($dir, $recurse=false, $level=0)
  {
    # array to hold return value
    $retval = array();

    # add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    # open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      # skip hidden files
      if($entry[0] == ".") continue;
      if(is_dir("$dir$entry")) {
		$nlevel = $level+1;
        $retval[] = array(
          "fullname" => "$dir$entry/",
		  "name" => "$entry",
          "size" => 0,
		  "level" => "$nlevel",
          "lastmod" => filemtime("$dir$entry")
        );
        if($recurse && is_readable("$dir$entry/")) {
          $retval = array_merge($retval, getFileList("$dir$entry/", true, $level+1));
        }
      } elseif(is_readable("$dir$entry")) {
		$nlevel = $level+1;
        $retval[] = array(
          "fullname" => "$dir$entry",
		  "name" => "$entry",
          "size" => filesize("$dir$entry"),
		  "level" => "$nlevel",
          "lastmod" => filemtime("$dir$entry")
        );
      }
    }
    $d->close();

    return $retval;
  }
  
  /**********************************************
    //FORMAT RAW SIZE FOR FRIENDLY DISPLAY
   ***********************************************/			
    function formatRawSize($bytes) {
 
        //CHECK TO MAKE SURE A NUMBER WAS SENT
        if(!empty($bytes)) {
 
            //SET TEXT TITLES TO SHOW AT EACH LEVEL
            $s = array('bytes', 'kb', 'MB', 'GB', 'TB', 'PB');
            $e = floor(log($bytes)/log(1024));
 
            //CREATE COMPLETED OUTPUT
            $output = sprintf('%.2f '.$s[$e], ($bytes/pow(1024, floor($e))));
 
            //SEND OUTPUT TO BROWSER
            return $output;
 
        }
   }
  
?>
