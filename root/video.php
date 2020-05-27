<?php

include "lib/xmlparser/xmlparser_php5.php";

$tkid = isset($_POST['tkid']) ? $_POST['tkid']: NULL;

if($tkid == NULL) {
   $tkid = isset($_GET['tkid']) ? $_GET['tkid']: NULL;
}

//Get the XML document loaded into a variable
$xml = file_get_contents("content/music/listings/video/tracklist1.xml");
//Set up the parser object
$parser = new XMLParser($xml);

//Work the magic...
$parser->Parse();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Music Video</title>
<meta name="keywords" content="video, player, music, songs, track, playlist, play, pause, next" />
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- JW Video Player -->
<link rel="stylesheet" href="css/jwplayernew.css" type="text/css" />

<!-- Horizontal Video Scroller -->
<link rel="stylesheet" type="text/css" href="css/scrollable-horizontal.css" />
<link rel="stylesheet" type="text/css" href="css/scrollable-buttons.css" />
<link rel="stylesheet" type="text/css" href="css/scrollable-navigator.css" />

<link rel="stylesheet" type="text/css" href="css/captify.css" />
<link rel="stylesheet" type="text/css" href="css/gradient-bar.css" />

<script src="js/videoslider/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/captify/captify.tiny.js"></script>
<script type="text/javascript">
	$(function(){
		$('img.captify').captify({});
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
	<li><a href="#">Technology</a>
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
	<li class="current"><a href="#">Entertainment</a>
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
    	<div class="text" style="background:#000 url(img/videoplayer/desktopblue.jpg) repeat top right;">
            <div style="height:10px"></div>

<!-- START OF VIDEO PLAYER -->
<script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
	<div class="OverviewVideoWrapper">
	  <div class="VideoPlayer">
			<div style="position: relative; width: 720px; height: 406px;" id="player1_wrapper">
               <object tabindex="0" name="player1" id="player1" bgcolor="#000000"
                       data="js/jwplayer/player.swf"
                       type="application/x-shockwave-flash"
                       width="100%"
                       height="100%">

                       <param value="true" name="allowfullscreen">
                       <param value="always" name="allowscriptaccess">
                       <param value="true" name="seamlesstabbing">
                       <param value="opaque" name="wmode">
                       <param value="id=player1&amp; stretching=fill&amp; autostart=true&amp; controlbar.position=over" name="flashvars">

               </object>
            </div>
	  </div>

	  <script type="text/javascript">

		jwplayer("player1").setup({
			skin: "/js/jwplayer/skins/beelden.zip",
			stretching: "fill",
			autostart: true,
			flashplayer: "/js/jwplayer/player.swf",
			playlist: [
               <?php

                $isfirst = false;

                foreach($parser->document->track as $track) {

                  if($isfirst == true) {
                    print(",");
                  }
                  else {
                      $isfirst = true;
                  }
                  print("\n\t");
                  print("{ file: \"http://www.youtube.com/watch?v=" . $track->ylink[0]->tagData .
                          "\", image: \"http://img.youtube.com/vi/" . $track->ylink[0]->tagData .
                          "/2.jpg\",");
                  print("\n\t");
                  print("title: \"" . $track->title[0]->tagData .
                          ": " . $track->artist[0]->tagData . "\" }");
                }

                print("\n\t");

               ?>

             ],
			volume: 80,
			height:406,
			width: 720,
            events: {
                   onComplete: function() { this.playlistNext();  },
				   onPlaylistItem: function(event) {
											var playItem = this.getPlaylistItem();
											$("#videoTitle").html(playItem.title);
				                          }
            }
		});
	  </script>

	</div>
<!-- END OF VIDEO PLAYER -->

<h2 id="videoTitle" class="gradientbar">Video Title</h2>

<!-- START OF VIDEO SCROLLER -->

<div class="videosliderwrap">

<!-- wrapper for navigator elements -->
<div class="videoscrollnavi"><a class="active" href="#0"></a><a href="#1"></a><a href="#2"></a></div>

<!-- "previous page" action -->
<a class="prev browse left"></a>

<!-- root element for scrollable -->
<div class="videoscroll" id="chained">

   <!-- root element for the items -->
   <div class="videoitems">

      <?php
                $counter = 0;
                $iteration = 1;
                reset($parser);

                foreach($parser->document->track as $track) {

                  if($counter == 0) {
                    print("\n");

                    if($iteration == 1) {
                        print("\n\t<!-- " . $iteration ."-" . (5*$iteration) ." -->");
                    }
                    else {
                        print("\n\t<!-- " . (5*($iteration-1)) ."-" . (5*$iteration) ." -->");
                    }
                    print("\n\t<div>");
                  }

                  print("\n\t");
                  print("<img id=\"" . $track->ylink[0]->tagData .
                          "\" class=\"captify\" src=\"http://img.youtube.com/vi/" . $track->ylink[0]->tagData .
                          "/2.jpg\" alt=\"". $track->title[0]->tagData ."<br />" .
                          $track->artist[0]->tagData . "\">");

                  if($counter == 5) {
                    print("\n\t</div>\n");
                    $iteration++;
                    $counter = 0;
                  }
                  else {
                    $counter++;
                  }
                }

                print("\n");
      ?>

   </div>

</div>

<!-- "next page" action -->
<a class="next browse right"></a>

<br clear="all">

<!-- javascript coding -->
<script>
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
$(document).ready(function() {

  $("#chained").scrollable({circular: true, mousewheel: true}).navigator();

  // heeeeeeeeeeere we go.
  $(".caption-wrapper div").click(function() {
     var imageObject = $(this).siblings().get(0);
	 $('#' + imageObject.id).trigger('click');
  });

  $(".videoitems img").click(function() {

	// see if same thumb is being clicked
	if ($(this).hasClass("active")) { return; }

    var videourl = "http://www.youtube.com/watch?v=" + $(this).attr("id");
    var imageurl = "http://img.youtube.com/vi/" + $(this).attr("id") + "/0.jpg";

 	var playlist = jwplayer("player1").getPlaylist();
	var i = 0;
	var isPresent = false;

	while(i < playlist.length && isPresent == false) {

		if(playlist[i].file == videourl) {
		   isPresent = true;
		}
		else {
		   i++;
		}
	}

    if(isPresent == true) {
	    jwplayer("player1").playlistItem(playlist[i].index);

		// activate item
   	    $(".videoitems img").removeClass("active");
	    $(this).addClass("active");
	}
  });

  <?php
      if($tkid != NULL && is_numeric($tkid) && $tkid > -1 && $tkid < count($parser->document->track)) {
		print("\n\t jwplayer().playlistItem(" .$tkid.");");
	  }
  ?>

});
</script>

</div>
<!-- END OF VIDEO SCROLLER -->

<div style="height:15px"></div>
<div style="height:15px"></div>

        </div>
        <div>


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
