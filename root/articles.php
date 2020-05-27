<?php

   $menu = isset($_POST['menu']) ? $_POST['menu']: NULL;

   if($menu == NULL) {
      $menu = isset($_GET['menu']) ? $_GET['menu']: "1";
   }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Articles</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Technical Articles focusing on diverse topics from Programming, Research to various emerging Tools" />
<meta name="keywords" content="articles, core, programming, research, tools, java"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Dynamic Page -->
<link rel='stylesheet' type='text/css' href='css/dynamicpage.css' />

<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Glow Tabs -->
<link rel="stylesheet" type="text/css" href="css/glowtabs.css" media="screen" />

<!--[if gte IE 6]>
<style type="text/css">

ul#navigation li.selected a:link, ul#navigation li.selected a:visited {
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#d1d1d1', endColorstr='#f2f2f2'); /* IE6,IE7 */
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#d1d1d1', endColorstr='#f2f2f2')"; /* IE8 */
}

</style>
<![endif]-->

<!-- Dynamic Page -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type='text/javascript' src='js/dynamicpage/jquery.ba-hashchange.min.js'></script>
<script type='text/javascript' src='js/dynamicpage/dynamicpage.js'></script>

<script src="js/mobile/jquery.touchSwipe-1.2.5.js"></script>

<link rel="stylesheet" href="css/pagebox.css" type="text/css" />

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
    	<div class="text" style="background:#000 url(img/dynamicpage/technology.jpg) repeat top left;">
            <div style="height:10px"></div>

        <!-- START OF ARTICLES -->

    <div class="dynamicpage">
	<div id="dynpage-page-wrap">

		  <nav class="glowtabs">
                  <ul id="navigation">
                	<li class="one<?php if($menu == "1") echo " selected"; ?>"><a id="one" href="content/articles/core.html">Core</a></li>
                	<li class="two<?php if($menu == "2") echo " selected"; ?>"><a   id="two" href="content/articles/programming.html">Programming</a></li>
                	<li class="three<?php if($menu == "3") echo " selected"; ?>"><a id="three" href="content/articles/tools.html">Tools</a></li>
                	<li class="four<?php if($menu == "4") echo " selected"; ?>"><a  id="four" href="content/articles/research.html">Research</a></li>
                	<li class="five<?php if($menu == "5") echo " selected"; ?>"><a  id="five" href="content/articles/tutorials.html">Tutorials</a></li>
                	<li class="shadow"></li>
                  </ul>
		  </nav>

                  <?php
                    switch ($menu) {
                        case "1":
                            include("content/articles/core.html");
                            break;
                        case "2":
                            include("content/articles/programming.html");
                            break;
                        case "3":
                            include("content/articles/tools.html");
                            break;
                        case "4":
                            include("content/articles/research.html");
                            break;
                        case "5":
                            include("content/articles/core.html");
                            break;
                        default:
                            include("content/articles/core.html");
                            break;
                    }
      ?>

	</div>

    </div>

     <script type="text/javascript">

      $(document).ready(function(){
      	$("ul#navigation li a").click(function() {
		  $("ul#navigation li").removeClass("selected");
		  $(this).parents().addClass("selected");
        });

      <?php
        switch ($menu) {
            case "1":
                echo("$(\"#one\").click();");
                break;
            case "2":
                echo("$(\"#two\").click();");
                break;
            case "3":
                echo("$(\"#three\").click();");
                break;
            case "4":
                echo("$(\"#four\").click();");
                break;
            case "5":
                echo("$(\"#five\").click();");
                break;
            default:
                echo("$(\"#one\").click();");
                break;
        }
      ?>

      });

     </script>

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

   <div id="searchLinks" style="display: none" >
      <a href="articles.php?menu=1"></a>
      <a href="articles.php?menu=2"></a>
      <a href="articles.php?menu=3"></a>
      <a href="articles.php?menu=4"></a>
   </div>

</div>
</body>
</html>
