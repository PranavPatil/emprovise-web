

<?php			
    require 'filelist.php';

     $dir = isset($_GET['dir']) ? $_GET['dir']: NULL;

     if ($dir != NULL) {
		 
       $dirlist = getFileList($dir, false);
	   sort($dirlist);
	   $filelist = "\n";
			  
       foreach ($dirlist as $value) {
		  
		  $filelist = $filelist . "<tr>\n";
		  $dirname = $value['name'];
				  
		  if($value['size'] > 0) {
 		     $filelist = $filelist . 
			 "<td> <img alt=\"text file\" height=\"16\" src=\"img/gradient-table/txt.png\" width=\"16\" /></td>\n" .
 		     "<td>\n" . 
 		     "<a name=\"file\" href=\"" . $dir . "/" . $dirname . "\" class=\"js-slide-to\">" . 
 		     $dirname . "</a>\n</td>\n" .
			 "<td style=\"text-align:right\">" . number_format($value['size']) . " bytes </td>\n";
		  }
		  else {
 		     $filelist = $filelist . 
 		     "<td> <img alt=\"directory\" height=\"16\" src=\"img/gradient-table/dir.png\" width=\"16\" /></td>\n" .
 		     "<td>\n" .
 		     "<a name=\"dir\" href=\"" . $dir . "/" . $dirname . "\" class=\"js-slide-to\">" .
 		     $dirname . "</a>\n</td>\n" . 
			 "<td> </td>\n";
		  }
		  
 	      $filelist = $filelist . 
                      "<td> </td>\n<td>" . date("F j, Y, g:i a (T)", $value['lastmod']) . "</td>\n" .
                      "</tr>\n";
       }
	   echo $filelist;
     }
	 else {
		 echo "Invalid Directory.";
	 }
?>