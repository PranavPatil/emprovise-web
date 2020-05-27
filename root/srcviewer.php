<?php require 'content/filelist.php';

function generatePathInfo($link)
{
   $text = "";
   $path = "";

   $filename = substr(strrchr($link, '/'), 1);
   $modlink = substr($link, 0, strripos($link, '/'));

   $tok = strtok($modlink, "/");

   while ($tok !== false) {

     $path = $path . $tok;
     $text = $text  . '<b><a href="' . $path . '" class="js-slide-to">' . $tok . '</a></b> / ';
     $path = $path . "/";

     $tok = strtok("/");
   }

   $text = $text  . "<b style=\"color:#000080;\"> " . $filename . " </b>";

   return $text;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>projects</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Display the Source Code for the Project" />
<meta name="keywords" content="source, code, viewer, display, projects"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Gradient Table -->
<link rel='stylesheet' type='text/css' href='css/gradient-table.css' />

<!-- GitHub Slider  -->
<style type="text/css">
.codestyle span{display:inline;}
.codestyle pre {
white-space: pre-wrap; /* css-3 */
white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
white-space: -pre-wrap; /* Opera 4-6 */
white-space: -o-pre-wrap; /* Opera 7 */
word-wrap: break-word; /* Internet Explorer 5.5+ */
}

</style>
<link type="text/css" rel="stylesheet" href="css/syntaxhighlighter/sh_ide-msvcpp.min.css">
<script type="text/javascript" src="js/syntaxhighlighter/sh_main.min.js"></script>

<script src="js/treeslider/jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="js/treeslider/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/treeslider/httprequest.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function() {

  $("#message, .loading").slideDown();
/*  $(window).load(function(){
//    $(".loading").stop(true, true).hide();
//    $("#message").fadeIn(2000);
	$("#message").slideDown();
  });
  */


  $('#pathinfo a').click(function(e) {

    e.preventDefault();
	$.postGo("projects.php", { filepath: $(this).attr('href') });
	return false;
  });

});

</script>
<style>
	#pathinfo{
        background-color: #DEDEDE;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border: 1px solid #9FB6CD;
        padding: 8px;
		width:800px;
		margin-left:45px;
		font-size:16px;
		float:left;
	}
	#pathinfo a{
		color:#0084C7;
		text-decoration:none;
	}

	#filelogo{
		width:60px;
		float:right;
		-moz-box-shadow: 5px 5px 5px #ccc;
        -webkit-box-shadow: 5px 5px 5px #ccc;
        box-shadow: 5px 5px 5px #ccc;
	}

</style>

</head>
<body  onLoad="sh_highlightDocument('js/syntaxhighlighter/lang/', '.min.js');">
<div class="bg_png">

<div id="main">
<!-- header begins -->
<div id="header">
	<div id="macmenu">
    <ul id="macmenu_nav">
	<li><a href="/">Home</a></li>
	<li class="current"><a href="#">Technology</a>
		<ul>
			<li><a href="/projects.php">Projects</a></li>
			<li><a href="/articles.php">Articles</a></li>
			<li><a href="/presentations.php">Presentations</a></li>
		</ul>
	</li>
	<li><a href="#">Tools</a>
		<ul>
			<li><a href="/search.html">LinkSearch</a></li>
			<li><a href="/enotes.php">E-Notes</a></li>
		</ul>
	</li>
	<li><a href="#">Entertainment</a>
		<ul>
			<li><a href="/music.php">Music</a></li>
			<li><a href="/video.php">Video</a></li>
		</ul>
	</li>
	<li><a href="/aboutme.php">About</a></li>
	<li><a href="/contactus.html">Contact Us</a></li>
	<li style="float:right; margin-right: 7px; margin-top:-3px;">
       <form id="searchform" class="searchform" action="/searchpage.php" method="get">
	     <input name="query" id="query"
				class="searchfield" value="Search..."
                onfocus="if (this.value == 'Search...') {this.value = '';}"
                onblur="if (this.value == '') {this.value = 'Search...';}"
                type="text">
		 <input type="hidden" name="search" value="1">
         <input class="searchbutton" type="submit" value=""
				style="background-image: url(img/searchbox/search-button.png); width: 17px; height: 16px;">
       </form>
    </li>
    </ul>

    </div>
	<div id="logo">
    	<b><a href="/index.html"><img src="img/globals/emprovise.gif" alt="emprovise" width="172" height="28" /></a><br />
        <span><a href="#"><small style="font-size:10px;">Enshrining Knowledge, Fabricating Ideas</small></a></span>
        </b>
    </div>
   <hr />
</div>
<!-- header ends -->
	<div class="temp_top"></div>
	<!-- content begins -->
  <div id="content">
        <center></center>
    	<div class="text">
            <div style="height:10px"></div>

        <!-- START OF PROJECTS -->

        <div id="treeslider">

         <?php

	       $vfile = isset($_POST['vfile']) ? $_POST['vfile']: NULL;

           if($vfile == NULL) {
        	 $vfile = isset($_GET['vfile']) ? $_GET['vfile']: "";
           }

           $pos  = strrchr($vfile, ".");
 	       $ext = substr($pos, 1, strlen($pos));
  		   $pclass = "";
		   $imgsrc = "";

	  	   switch ($ext)
           {
             case "java":         $pclass = "sh_java";
                                  $imgsrc = "java_logo.png";
                                  break;
             case "cpp":          $pclass = "sh_cpp";
                                  $imgsrc = "cpp_logo.png";
                                  break;
             case "c":            $pclass = "sh_c";
                                  $imgsrc = "c_logo.png";
                                  break;
             case "cs":           $pclass = "sh_csharp";
                                  $imgsrc = "csharp_logo.png";
                                  break;
             case "py":           $pclass = "sh_python";
                                  $imgsrc = "python_logo.png";
                                  break;
             case "php":          $pclass = "sh_php";
                                  $imgsrc = "web_logo.png";
                                  break;
             case "jsp":          $pclass = "sh_html";
                                  $imgsrc = "web_logo.png";
                                  break;
             case "asp":          $pclass = "sh_html";
                                  $imgsrc = "web_logo.png";
                                  break;
             case "sql":          $pclass = "sh_sql";
                                  $imgsrc = "no_logo.png";
                                  break;
             case "xml":          $pclass = "sh_xml";
                                  $imgsrc = "no_logo.png";
                                  break;
             case "pl":           $pclass = "sh_perl";
                                  $imgsrc = "web_logo.png";
                                  break;
             case "js":           $pclass = "sh_javascript";
                                  $imgsrc = "web_logo.png";
                                  break;
             case "html":         $pclass = "sh_html";
                                  $imgsrc = "web_logo.png";
                                  break;
             case "sh":           $pclass = "sh_sh";
                                  $imgsrc = "linux_logo.png";
                                  break;
             default:             $pclass = "sh_sh";
                                  $imgsrc = "no_logo.png";
		                          break;
           }

         ?>

         <div style="width:950px; height:30px;">
           <div id="pathinfo" data-path="/">
             <?php printf(generatePathInfo($vfile)); ?>
           </div>
           <div id="filelogo"><img src="img/filetypes/<?php printf($imgsrc); ?>" alt="<?php printf($ext); ?>" />
           </div>
         </div>
         <br />

        <div id="message" class="codestyle" align="center" style="width:950px; padding:10px 20px 10px 10px; background:#F6F9ED;">

           <pre  id="codePre" style="text-align:left;font-size: 12px; color:#000; width: 920px; background:#F6F9ED;" class="<?php echo $pclass; ?>">

           <?php
            if (file_exists("content/" . $vfile)) {
	          $fh = fopen("content/" . $vfile, 'r');
              $theData = fread($fh, filesize("content/" . $vfile));
              fclose($fh);

  		      echo "\n";
              echo $theData;
		    }
		    else
		      echo "<center><h2>File Not Found: " . $vfile . "</h2></center>";
	       ?>
           </pre>
        </div>

        </div>

        <!-- END OF PROJECTS -->
        <div style="height:10px"></div>
        </div>
    </div>
    <!-- content ends -->
<!-- footer begins -->
            <div id="footer">
          		<div style="float: left; width: 500;">
                	<p>Copyright  2011. <!-- Do not remove -->Designed and Developed by <a href="http://www.emprovise.com" title="Emprovise">Emprovise</a><!-- end --></p>
		        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p>
             	</div>
                <div style="float: right; width: 500; padding: 0px 0px 0px 0px; height: 37px;">
                	<a href="#" class="a_fu_i"><img src="img/footer/fu_i5.gif" class="fu_i" alt="" /></a>
                    <a href="#" class="a_fu_i"><img src="img/footer/fu_i4.gif" class="fu_i" alt="" /></a>
                    <a href="#" class="a_fu_i"><img src="img/footer/fu_i3.gif" class="fu_i" alt="" /></a>
                    <a href="https://twitter.com/#!/EmproviseWeb" class="a_fu_i"><img src="img/footer/fu_i2.gif" class="fu_i" alt="" /></a>
                    <a href="http://www.facebook.com/people/Emprovise-Web/100003220944716" class="a_fu_i"><img src="img/footer/fu_i1.gif" class="fu_i" alt="" /></a>

                </div>
             </div>
        <!-- footer ends -->
</div>

</div>
</body>
</html>
