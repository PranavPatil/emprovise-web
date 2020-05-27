<?php

   $slidename = isset($_POST['slidename']) ? $_POST['slidename']: NULL;

   if($slidename == NULL) {
	   $slidename = isset($_GET['slidename']) ? $_GET['slidename']: "enterprisespring";
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>
      <?php printf($slidename); ?>
    </title>
    <meta content="text/html; charset=utf-8" http-equiv="content-type" />
    <meta name="generator" content="WebPoint PPT to HTML Converter 1.5.1.1" />
	<meta name="keywords" content="presentation, slide, keynote, powerpoint, slideplayer"/>
    <link rel="stylesheet" type="text/css" href="slides/StyleSheets/player.css" />
    <link rel="stylesheet" type="text/css" href="slides/StyleSheets/Variation/playerColor.css" /><!-- media query for ipad -->
    <link rel="stylesheet" href="slides/StyleSheets/mobileSafari.css" media="only screen and (device-width: 768px)" type="text/css" /><!-- media query end -->
    
    <!-- Emprovise Header CSS Start -->
    <link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />
    <!-- Emprovise Header CSS End -->

    <script type="text/javascript" src="slides/Scripts/prototype/prototype.js"></script>
    <script type="text/javascript" src="slides/Scripts/scriptaculous/effects.js"></script>
    <script type="text/javascript" src="slides/Scripts/webshow/webshow.compressed.js"></script>
    <script type="text/javascript" src="slides/Scripts/iscroll.js"></script>
    <script type="text/javascript" src="slides/Scripts/player.js"></script>
    <script type="text/javascript" src="slides/Scripts/SOTCAnimator.js"></script>
    <script type="text/javascript">
	
 function slidePanel(elementId, headerElement)
 {
   var element = document.getElementById(elementId);
   if(element.up == null || element.down)
   {
      new Effect.Morph('sideTopPanelClient', {duration: 0.3, style: {height: '150px'}});
      element.up = true;
      element.down = false;
      headerElement.innerHTML = '<img src="slides/StyleSheets/Images/uparrow.png" width="32" height="32" />';
   }
   else
   {
      new Effect.Morph('sideTopPanelClient', {duration: 0.3, style: {height: '0px'}});
      element.down = true;
      element.up = false;
      headerElement.innerHTML = '<img src="slides/StyleSheets/Images/home.gif" width="32" height="32" />';
   }
 }
 
</script>

<style type="text/css">
#sideTopPanelClient {
/*  position: relative;
	height: 0px;
	min-width: 100px;
	width: 100%;
	zoom: 1;
*/	
    float: top;
	overflow-y: hidden;
	overflow-x: hidden;
	position:relative;
  	width: 1014px;
    height:0px;
    top:20px;
    left:0px;
    overflow:hidden;
	margin: 0px auto 0px auto;
	z-index: 1;
}

#sideHeader {
/*	margin: 0;
	padding: 0;
	border-top: solid 4px #000;
	background: #acae77;
	*/
	
    position:relative;
    width:50px;
    height:20px;
    top:0px;
    left:0px;
/*    background:#3b587a; */
    text-align:center;
    color:#FFFFFF;	
    cursor: hand;
    cursor: pointer;
	text-decoration: none;
	float:right; 
}

/*
#sideHeader
{
  position: relative;
  float: left;
}
#sideHeader a
{
  outline: none;
}
#SlideHeaderDir
{
  float: left;
  width: 31px;
  height: 66px;  
  background-position: left;
  background-repeat: no-repeat;
  cursor: hand;
  cursor: pointer;
  zoom: 1;
}
#SlideHeaderDir span
{
  display: none;
}
*/

</style>

    <meta name="Author" content="EvalUser" />
    <link rel="stylesheet" href="slides/StyleSheets/wsApp.css" type="text/css" />
    <link rel="webshow.app" href="slides/Configs/<?php printf($slidename); ?>.xmljs" target="#wsStage" />

  </head>
  <body>
    <noscript>
      <p id="noScriptNotify">You must enable JavaScript in your browser to view the dynamic slide play.</p>
      <link href="slides/StyleSheets/noScript.css" rel="stylesheet" type="text/css" />
    </noscript>
    
    <!-- Main Panel Begins -->
    <div id="sideTopPanelClient">
    
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

	</div>
    <!-- Main Panel Ends -->
    <div id="sideHeader" onclick="slidePanel('sideTopPanelClient', this);"><img src="slides/StyleSheets/Images/home.gif" width="32" height="32" /></div>
    
    <div id="wsPlayer">
      <div id="sidePanel">
        <div id="sidePanelClient">
          <div id="sidePanelScroller">
            <div id="wsSlideDir"></div>
          </div>
          <div id="slideListScrollButtonPanel">
            <div id="slideListScrollButtonGroup">
              <a id="btnSlideListScrollToTop" class="BtnScroll" title="Scroll to Top" href="#" name="btnSlideListScrollToTop"><span>Top</span></a> <a id="btnSlideListScrollUp" class="BtnScroll" title="Scroll Up" href="#" name="btnSlideListScrollUp"><span>Up</span></a> <a id="btnSlideListScrollDown" class="BtnScroll" title="Scroll Down" href="#" name="btnSlideListScrollDown"><span>Down</span></a> <a id="btnSlideListScrollToBottom" class="BtnScroll" title="Scroll to Bottom" href="#" name="btnSlideListScrollToBottom"><span>Bottom</span></a>
            </div>
          </div>
        </div>
        <div id="sidePanelTabs">
          <a id="tabSlideDir" title="Slide List" name="tabSlideDir"><span>Slide Dir</span></a>
        </div>
      </div>
      <table id="content" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody>
          <tr>
            <td>
              <div id="mainClient">
                <div id="wsStage">
                  <div id="wsSplash">
                    <p id="wsSplashTitle">
                      <span>loading, please wait for a moment...</span>
                    </p>
                    <p id="wsSplashNotify">
                      NOTE: You must enable JavaScript in your browser to view this page.
                    </p>
                  </div>
                </div>
                <div style="DISPLAY: none" id="logPanel">
                  <div id="logPanelTitle">
                    Logs<a id="logCloser" class="LogPanelCloser" title="Close Log" href="#" name="logCloser"><span>X</span></a>
                  </div>
                  <div id="wsLogWrapper">
                    <div id="wsLog"></div>
                  </div>
                </div>
              </div>
              <div id="bottomPanel">
                <div id="wsStatus">
                  <span id="wsSlideTitle"></span>[<span id="wsSlideIndex"></span>/<span id="wsSlideCount"></span>]
                </div>
              </div>
            </td>
            <td align="center">
              <div id="wsController">
                <a id="navHelp" title="Help" href="#" name="navHelp"><span>Help</span></a> <a id="navPrevSlide" title="Previous Slide" href="#" webshow_command="App:PrevSlide" name="navPrevSlide"><span>Prev Slide</span></a> <a id="navPrevstep" title="Previous Step" href="#" webshow_command="App:PrevStep" name="navPrevstep"><span>Prev Step</span></a> <a id="navNextStep" title="Next Step" href="#" webshow_command="App:NextStep" name="navNextStep"><span>Next Step</span></a> <a id="navNextSlide" title="Next Slide" href="#" webshow_command="App:NextSlide" name="navNextSlide"><span>Next Slide</span></a> <a id="navAutoPlay" title="Toggle Autoplay" href="#" webshow_command="App:ToggleAutoPlay" name="navAutoPlay"><span>Auto Play</span></a> <a id="navLog" title="Toggle Log" href="#" name="navLog"><span>Log</span></a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php include("slides/content/" . $slidename . ".html"); ?>
  </body>
</html>
