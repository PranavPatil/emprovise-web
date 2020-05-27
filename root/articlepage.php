
<?php

function getFullCurrentUrl()
{
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}

$http		=  'http://';           // $_SERVER['HTTPS'] = 'on' ? 'https://':'http://';
// $url		= urlencode($http.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
$url		= urlencode($http.$_SERVER['SERVER_NAME']);
$screen_name	= 'EmproviseWeb';  // use your Twitter screen name
$hashtags 	= "twitterapi,coding";  // comma separated list of hashtags (without #) to automatically be inserted into the tweet


$artitle = isset($_POST['atitle']) ? $_POST['atitle']: NULL;

   if($artitle == NULL) {
	   $artitle = isset($_GET['atitle']) ? $_GET['atitle']: "Title Not Found";
   }

$arpath = isset($_POST['apath']) ? $_POST['apath']: NULL;

   if($arpath == NULL) {
	   $arpath = isset($_GET['apath']) ? $_GET['apath']: "nofile";
   }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php print($artitle); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keywords" content="display, technical, articles, rate, page"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Article Page -->
<link rel="stylesheet" href="css/google-article.css" type="text/css" media="screen" />
<!-- Scroll To Top -->
<link rel="stylesheet" href="css/ui.totop.css" type="text/css" media="screen,projection" />
<!-- Rating Stars -->
<link rel="stylesheet" href="css/jquery.ui.stars.css" type="text/css" />
<!-- vTip ToolTip -->
<link rel="stylesheet" href="css/vtip.css" type="text/css" />

<!-- Rating Stars -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type="text/javascript" src="js/stars/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="js/stars/jquery.ui.stars.js"></script>
<!-- Twitter Integration -->
<script type="text/javascript" src="js/socialweb/twitter-widgets.js"></script>
<!-- vTip ToolTip -->
<script type="text/javascript" src="js/vtip/vtip.js"></script>
<!-- easing plugin ( optional ) -->
<script type="text/javascript" src="js/scrolltotop/easing.js"></script>
<!-- UItoTop plugin -->
<script type="text/javascript" src="js/scrolltotop/jquery.ui.totop.js"></script>
<script type="text/javascript">
		$(function(){
			// Create stars from :radio boxes
			$("#stars-wrapper1").stars({
				split: 2,
				oneVoteOnly: true
			});
		});

		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'moccaUItoTop', // fading element id
				containerHoverClass: 'moccaUIhover', // fading element hover class
				scrollSpeed: 1200,
				easingType: 'linear'
	 		};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });
		});

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
    	<div class="text" style="
          background-color: rgba(238, 238, 238, 1);
          background-image: url(#EEEEEE none repeat scroll top left);
          background-position: left top;
          background-repeat: no-repeat;">
            <div style="height:10px"></div>
        <!-- START OF ARTICLES -->

<div class="article">
  <div class="article-header">
    <a class="ribbon date " title="31st January" href="#">
      <div class="top ribbon-piece">Jan</div>
      <div class="bottom ribbon-piece">31</div>
      <div class="tail">
        <div class="left ribbon-piece"></div>
        <div class="right ribbon-piece"></div>
      </div>
    </a>

    <h1 class="title" style="font: 26px Tahoma, Helvetica, Arial, Sans-Serif; text-align: center;color: #8B7E8B; text-shadow: 0px 2px 3px #888;"><?php printf($artitle); ?>
    </h1>

      <div class="socialBar">
			<div class="socialIcon">
				<a class="subscribeSidebarBox" href="/lib/feedwriter/sample.php"><img src="img/icons/RSS.png" alt="RSS"></a>
			</div>

			<div class="socialIcon">
				<a class="subscribeSidebarBox" href="http://www.facebook.com/sharer.php
?u=<?php echo urlencode(getFullCurrentUrl()); ?>&t=<?php echo urlencode("Article Title");?>" target="_blank"><img src="img/icons/Facebook.png" alt="Facebook"></a>
			</div>

			<div class="socialIcon">
				<a class="subscribeSidebarBox" href="https://twitter.com/intent/tweet?original_referer=<?php echo $url; ?>&source=tweetbutton&text=<?php echo urlencode("Article Title");?>&url=<?php echo urlencode(getFullCurrentUrl()); ?>&via=EmproviseWeb"><img src="img/icons/Twitter.png" alt="Twitter"></a>
			</div>
            <br />
            <form style="padding-top:20px; padding-left:10px;">
               <div id="stars-wrapper1">
                  <input type="radio" name="newrate" value="1" title="Very poor" />
                  <input type="radio" name="newrate" value="2" title="Poor" />
                  <input type="radio" name="newrate" value="3" title="Not that bad" />
                  <input type="radio" name="newrate" value="4" title="Fair" />
                  <input type="radio" name="newrate" value="5" title="Average" checked="checked" />
                  <input type="radio" name="newrate" value="6" title="Almost good" />
                  <input type="radio" name="newrate" value="7" title="Good" />
                  <input type="radio" name="newrate" value="8" title="Very good" />
                  <input type="radio" name="newrate" value="9" title="Excellent" />
                  <input type="radio" name="newrate" value="10" title="Perfect" />
               </div>
            </form>
      </div>

  </div>

  <!-- ######################################################################################################################## -->
  <div class="article-content">
  <?php

    if (file_exists("content/articles/" . $arpath)) {

	   include("content/articles/" . $arpath);
    }
    else {
	   echo "<center><h2>Article Not Found: " . $arpath . "</h2></center>";
	}

  ?>
  </div>
  <!-- ######################################################################################################################## -->

  <div class="article-footer">
  </div>

</div>


        <!-- END OF ARTICLES -->
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
