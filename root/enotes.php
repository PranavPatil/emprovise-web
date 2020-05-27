<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// Including the DB connection file:
require 'lib/db/connect.php';

// Removing notes that are older than an hour:
mysql_query("DELETE FROM notes WHERE id>3 AND dt<SUBTIME(NOW(),'0 1:0:0')");

$query = mysql_query("SELECT * FROM notes ORDER BY id DESC");

$notes = '';
$left='';
$top='';
$zindex='';

while($row=mysql_fetch_assoc($query))
{
	// The xyz column holds the position and z-index in the form 200x100x10:
	list($left,$top,$zindex) = explode('x',$row['xyz']);

	$notes.= '
	<div class="note '.$row['color'].'" style="left:'.$left.'px;top:'.$top.'px;z-index:'.$zindex.'">
		'.htmlspecialchars($row['text']).'
        <div class="date">'.htmlspecialchars($row['dt']).'</div>
		<div class="tags">
           <span class="tag">'.htmlspecialchars($row['name']).'</span>
        </div>
		<span class="data">'.$row['id'].'</span>
	</div>';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>E-Notes</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="ENotes allows to take temperary notes which are persisted and easily accessible for a period 24 hours" />
<meta name="keywords" content="enotes, notes, title, tag"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Sticky Notes -->
<link rel="stylesheet" type="text/css" href="css/stickynotes.css" />
<link rel="stylesheet" type="text/css" href="img/stickynotes/fancybox/jquery.fancybox-1.2.6.css" media="screen" />

<script type="text/javascript" src="js/stickynotes/jquery.min.js"></script>
<script type="text/javascript" src="js/stickynotes/jquery-ui.min.js"></script>
<script type="text/javascript" src="img/stickynotes/fancybox/jquery.fancybox-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/stickynotes/stickynotes.js"></script>

<!-- Cufon Font -->
<script src="js/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon/ChunkFive_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('.etitle', { textShadow: '1px 1px 1px #000000', fontSize:'24px' });
</script>

</head>
<body>
<div class="bg_png">

<div id="main">
<!-- header begins -->
<div id="header">
	<div id="macmenu">
    <ul id="macmenu_nav">
	<li><a href="/">Home</a></li>
	<li><a href="#">Technology</a>
		<ul>
			<li><a href="/projects.php">Projects</a></li>
			<li><a href="/articles.php">Articles</a></li>
			<li><a href="/presentations.php">Presentations</a></li>
		</ul>
	</li>
	<li class="current"><a href="#">Tools</a>
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
    	<div class="text" style="background:#ccc url(img/stickynotes/main/darkwood-texture.jpg) repeat top left;">
            <div style="height:10px"></div>
        <!-- START OF ABOUTME BOOKLET -->

             <div class="stickynotes">
              <h1 class="etitle">E-Notes</h1>

              <div id="main">
                	<a id="addButton" class="green-button" href="content/add_note.html">Add a note</a>
              	      <?php echo $notes?>
              </div>
             </div>
            <div style="height:10px"></div>

        <!-- END OF ABOUTME BOOKLET -->
        <div style="height:10px"></div>
        </div>
    </div>
    <!-- content ends -->
<!-- footer begins -->
            <div id="footer">
          		<div style="float: left; width: 500;">
                	<p>Copyright  2011. <!-- Do not remove -->Designed and Developed by <a href="http://www.emprovise.com" title="Emprovise">Emprovise</a><!-- end --></p>
		        <p><a href="/policy.html">Privacy Policy</a> | <a href="/terms.html">Terms of Use</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p>
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
