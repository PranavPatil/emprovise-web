<?php

include "lib/xmlparser/xmlparser_php5.php";

$mainpath = "content/music/";
$tracklist1 = "content/music/listings/audio/tracklist1.xml";
$tracklist2 = "content/music/listings/audio/tracklist2.xml";
$playlist = 0;

$tkid = isset($_POST['tkid']) ? $_POST['tkid']: NULL;

if($tkid == NULL) {
   $tkid = isset($_GET['tkid']) ? $_GET['tkid']: NULL;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Music Audio</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keywords" content="music, audio, player, track, playlist, artist, albums, pop, rock"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- MP Audio Player -->
<link rel="stylesheet" href="css/mp-wrapper.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/skin.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/jplayer.codrops.css" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
<script src="js/mpplayer/jquery.jcarousel.min.js" type="text/javascript"></script>
<script src="js/mpplayer/cufon-yui.js" type="text/javascript"></script>
<script src="js/mpplayer/jquery.jplayer.min.js" type="text/javascript"></script>
<script src="js/mpplayer/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('.convert',{
				textShadow: '1px 1px 1px #000000'
			});
		</script>

		<script type="text/javascript">
			$(function() {
			/**
			* build the carousel for the Albums
			*/
			$('#mp_albums').jcarousel({
				scroll : 3
			}).children('li')
			  .bind('click',function(){
				//when clicking on an album, display its info, and hide the current one
				var $this = $(this);
				$('#mp_content_wrapper').find('.mp_content:visible')
							.hide();

				$('#mp_content_wrapper').find('.mp_content:nth-child('+ parseInt($this.index()+1) +')')
							.fadeIn(1000);
			});

			/****  The Player  ****/
			// Local copy of jQuery selectors, for performance.
			var jpPlayTime = $("#jplayer_play_time");
			var jpTotalTime = $("#jplayer_total_time");
			var $list 		= $("#jplayer_playlist ul");

			/**
			* Innitialize the Player
			* (see jPlayer documentation for other options)
			*/
			$("#jquery_jplayer").jPlayer({
				oggSupport	: true,
				preload		:"auto"
			})
			.jPlayer("onProgressChange",
				function(loadPercent, playedPercentRelative, playedPercentAbsolute, playedTime, totalTime) {
				jpPlayTime.text($.jPlayer.convertTime(playedTime));
				jpTotalTime.text($.jPlayer.convertTime(totalTime));
			})
			.jPlayer("onSoundComplete", function() {
				playListNext();
			});

			/**
			* click previous button, plays previous song
			*/
			$("#jplayer_previous").bind('click', function(){
				playListPrev();
				$(this).blur();
				return false;
			});

			/**
			* click next button, plays next song
			*/
			$("#jplayer_next").bind('click', function() {
				playListNext();
				$(this).blur();
				return false;
			});

			/**
			* plays song in position i of the list of songs (playlist)
			*/
			function playSong(i){
				var $next_song 		= $list.find('li:nth-child('+ i +')');
				var mp3				= $next_song.find('.mp_mp3').html();
				var ogg				= $next_song.find('.mp_ogg').html();
				$list.find('.jplayer_playlist_current').removeClass("jplayer_playlist_current");
				$next_song.find('a').addClass("jplayer_playlist_current");
				$("#jquery_jplayer").jPlayer("setFile", mp3, ogg).jPlayer("play");
			}

			/**
			* plays the next song in the playlist
			*/
			function playListNext() {
				var $list_nmb_elems = $list.children().length;
				var $curr 			= $list.find('.jplayer_playlist_current');
				var idx				= $curr.parent().index();
				var index 			= (idx < $list_nmb_elems-1) ? idx+1 : 0;
				playSong(index+1);
			}

			/**
			* plays the previous song in the playlist
			*/
			function playListPrev() {
				var $list_nmb_elems = $list.children().length;
				var $curr 			= $list.find('.jplayer_playlist_current');
				var idx				= $curr.parent().index();
				var index 			= (idx-1 >= 0) ? idx-1 : $list_nmb_elems-1;
				playSong(index+1);
			}

			/**
			* User clicks the play icon on one of the songs listed for an Album.
			* Adds it to the Playlist, and plays it
			*/
			function addFirst(song_idx,name,mp3,ogg) {
				$list.empty();
				/**
				* each song element in the playlist has:
				* - span for the close / remove action
				* - the mp3 path
				* - the ogg path
				*/
				var song_html = "<a href='#' class='jplayer_playlist_current' tabindex='1'>" + name + "</a>";
				song_html 	 += "<span></span>";
				song_html 	 += "<div class='mp_mp3' style='display:none;'>"+mp3+"</div>";
				song_html 	 += "<div class='mp_ogg' style='display:none;'>"+ogg+"</div>";
				var $listItem = $("<li/>",{
					id			: song_idx,
					className	: 'jplayer_playlist_current',
					html 		: song_html
				});
				$list.append($listItem);
				//event to play the song when User clicks on it
				$listItem.find('a').bind('click',clickSong);
				//event to remove the song from the playlist when User clicks the remove button
				$listItem.find('span').bind('click',removeSong);
				//start playing it
				$("#jquery_jplayer").jPlayer("setFile", mp3, ogg).jPlayer("play");
				jpTotalTime.show();
				jpPlayTime.show();
			}

			/**
			* adds a song to the playlist, if not there already.
			* if it is the only one, start playing it
			*/
			function addToPlayList(song_idx,name,mp3,ogg) {
				var $list_nmb_elems = $list.children().length;
				//if already in the list return
				if($list.find('#'+song_idx).length)
					return;
				//class for the current song being played
				var c = '';
				if($list_nmb_elems == 0)
					c = 'jplayer_playlist_current';
				var song_html = "<a href='#' class="+c+" tabindex='1'>" + name + "</a>";
				song_html 	 += "<span></span>";
				song_html 	 += "<div class='mp_mp3' style='display:none;'>"+mp3+"</div>";
				song_html 	 += "<div class='mp_ogg' style='display:none;'>"+ogg+"</div>";
				var $listItem = $("<li/>",{
					id			: song_idx,
					html 		: song_html
				});
				$list.append($listItem);
				//if its the only song play it
				if($list_nmb_elems == 0){
					$("#jquery_jplayer").jPlayer("setFile", mp3, ogg).jPlayer("play");
					jpTotalTime.show();
					jpPlayTime.show();
				}
				$listItem.find('a').bind('click',clickSong);
				$listItem.find('span').bind('click',removeSong);
			}

			/**
			* removes a song from the playlist.
			* if the song was the current one, and there are more songs
			* in the playlist, then plays the next one.
			* if there are no more, stops the player, and removes the status bar
			* otherwise keeps playing whatever song was being played
			*/
			function removeSong() {
				var $this 	= $(this);
				var current = $this.parent().find('a.jplayer_playlist_current').length;
				$this.parent().remove();
				var $list_nmb_elems = $list.children().length;
				if($list_nmb_elems > 0 && current)
					playListNext();
				else if($list_nmb_elems == 0){
					$("#jquery_jplayer").jPlayer("clearFile");
					jpTotalTime.hide();
					jpPlayTime.hide();
				}
				return false;
			}

			/**
			* User clicks on a song in the playlist. Plays it
			*/
			function clickSong() {
				var index = $(this).parent().index();
				playSong(index+1);
				return false;
			}

			/**
			* The next are the events for clicking on both "play" and "add to playlist" icons
			*/
			$('#mp_content_wrapper').find('.mp_play').bind('click',function(){
			  var $this 		= $(this);
			  var $paths		= $this.parent().siblings('.mp_song_info');
			  var title   	= $paths.find('.mp_song_title').html();
			  var mp3			= $paths.find('.mp_mp3').html();
			  var ogg			= $paths.find('.mp_ogg').html();
			  var album_id 	= $this.closest('.mp_content').attr('id');
			  var song_index	= $this.parent().parent().index();
			  var song_idx	= album_id + '_' + song_index;
			 //add to playlist and play the song
			 addFirst(song_idx,title,mp3,ogg);
			});
			$('#mp_content_wrapper').find('.mp_addpl').bind('click',function(){
			  var $this 		= $(this);
			  var $paths		= $this.parent().siblings('.mp_song_info');
			  var title   	= $paths.find('.mp_song_title').html();
			  var mp3			= $paths.find('.mp_mp3').html();
			  var ogg			= $paths.find('.mp_ogg').html();
			  var album_id 	= $this.closest('.mp_content').attr('id');
			  var song_index	= $this.parent().parent().index();
			  var song_idx	= album_id + '_' + song_index;
			  //add to playlist and play the song if none is there
			  addToPlayList(song_idx,title,mp3,ogg);
			});

			/**
			* we want to show on the album image, the play button for playing the whole album
			*/
			$('#mp_content_wrapper').find('.mp_content').bind('mouseenter',function(){
				var $this 		= $(this);
				$this.find('.mp_playall').show();
			}).bind('mouseleave',function(){
                                var $this 		= $(this);
                                $this.find('.mp_playall').hide();
			});

			/**
			* to play the whole album, we play the first song and add all the others to the playlist.
			* playing the first one, guarantees us that the playlist is set to empty before
			*/
			$('#mp_content_wrapper').find('.mp_playall').bind('click',function(){
				var $this 		= $(this);
				var $album		= $this.parent();
				$album.find('.mp_play:first').trigger('click');
				$album.find('.mp_addpl').trigger('click');
			})

			/**
			* playlist songs can be reordered
			*/
			$list.sortable();
			$list.disableSelection();

                        <?php
                          if($tkid != NULL) {
                		print("\n\t $('#". $tkid ."').trigger('click');");
                          }
                        ?>

			});
		</script>
        <style>
			.reference{
				font-family:Arial;
				position:relative;
				width:100%;
				font-size:12px;
				text-transform:uppercase;
				text-align:center;
			}
			.reference a{
				color:#f9f9f9;
				text-decoration:none;
				margin-right:20px;
			}
			.convert {
				color:#FFF;
			}
		</style>
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
    	<div class="text" style="background:#000 url(img/mpplayer/background.jpg) repeat top left;">
            <div style="height:10px"></div>

        <!-- START OF MPPLAYER -->

		<div class="mp_wrapper">

			<div id="mp_content_wrapper" class="mp_content_wrapper">
				<div class="mp_content" id="c_album_1">
					<img src="content/music/album1/album.jpg" alt="album1"/>
					<a href="#" class="mp_playall">Play all</a>
					<div class="mp_description">
						<h2 class="convert">POP Explosion</h2>
						<p style="color:#FFF;">
							POP Explosion comprises the top hit tracks in pop music in recent years.
                                                        These popular songs received world wide accolades and considered as finest
                                                        creation in pop music. The compilation is solely based on user ratings and
                                                        number of plays per track.
						</p>
					</div>
					<div class="mp_songs">

                                      <?php

                                        $xml = file_get_contents($tracklist1);
                                        $parser = new XMLParser($xml);
                                        $parser->Parse();
                                        $count = 0;

                                        foreach($parser->document->track as $track) {
                                      ?>
					  <div>
                                                <h3 class="convert"><?php print($track->title[0]->tagData); ?></h3>
						<div class="mp_options">
							<span <?php print("id=\"lt" . $playlist . "tk" . $count . "\""); ?> class="mp_play">Play</span>
							<span class="mp_addpl">Add to playlist</span>
						</div>
						<div class="mp_song_info" style="display:none;">
						    <span class="mp_song_title"><?php print($track->title[0]->tagData); ?></span>
						    <span class="mp_mp3"><?php print($mainpath . $track->file[0]->tagData . ".mp3"); ?></span>
						    <span class="mp_ogg"><?php print($mainpath . $track->file[0]->tagData . ".ogg"); ?></span>
						</div>
					  </div>
                                      <?php
                                           $count++;
                                        }

                                        $playlist++;
                                      ?>

					</div>
				</div>
				<div class="mp_content" id="c_album_2" style="display:none;">
					<img src="content/music/album2/album.jpg" alt="album2"/>
					<a href="#" class="mp_playall">Play all</a>
					<div class="mp_description">
						<h2 class="convert">ROCK Songs</h2>
						<p style="color:#FFF;">
      							Rock is one of the most popular music styles since mid 20th century. This album is inspired by the
                                                        great artists who have influenced the rock and roll music. The tracks range from last 2 decades,
                                                        featuring some pioneering bands in rock music. These tracks reflect the unique music experience with
                                                        double sided guitars.
						</p>
					</div>
					<div class="mp_songs">

                                      <?php

                                        $xml = file_get_contents($tracklist2);
                                        $parser = new XMLParser($xml);
                                        $parser->Parse();
                                        $count = 0;

                                        foreach($parser->document->track as $track) {
                                      ?>
					  <div>
                                                <h3 class="convert"><?php print($track->title[0]->tagData); ?></h3>
						<div class="mp_options">
							<span <?php print("id=\"lt" . $playlist . "tk" . $count . "\""); ?> class="mp_play">Play</span>
							<span class="mp_addpl">Add to playlist</span>
						</div>
						<div class="mp_song_info" style="display:none;">
						    <span class="mp_song_title"><?php print($track->title[0]->tagData); ?></span>
						    <span class="mp_mp3"><?php print($mainpath . $track->file[0]->tagData . ".mp3"); ?></span>
						    <span class="mp_ogg"><?php print($mainpath . $track->file[0]->tagData . ".ogg"); ?></span>
						</div>
					  </div>
                                      <?php
                                           $count++;
                                        }

                                        $playlist++;
                                      ?>

					</div>
				</div>
			</div>
			<div class="mp_player">
				<div id="jquery_jplayer"></div>
				<div class="jp-playlist-player">
					<div class="jp-interface">
						<ul class="jp-controls">
							<li><a href="#" id="jplayer_play" class="jp-play" tabindex="1">play</a></li>
							<li><a href="#" id="jplayer_pause" class="jp-pause" tabindex="1">pause</a></li>
							<li><a href="#" id="jplayer_stop" class="jp-stop" tabindex="1">stop</a></li>
							<li><a href="#" id="jplayer_volume_min" class="jp-volume-min" tabindex="1">min volume</a></li>
							<li><a href="#" id="jplayer_volume_max" class="jp-volume-max" tabindex="1">max volume</a></li>
							<li><a href="#" id="jplayer_previous" class="jp-previous" tabindex="1">previous</a></li>
							<li><a href="#" id="jplayer_next" class="jp-next" tabindex="1">next</a></li>
						</ul>
						<div class="jp-progress">
							<div id="jplayer_load_bar" class="jp-load-bar">
								<div id="jplayer_play_bar" class="jp-play-bar"></div>
							</div>
						</div>
						<div id="jplayer_volume_bar" class="jp-volume-bar">
							<div id="jplayer_volume_bar_value" class="jp-volume-bar-value"></div>
						</div>
						<div id="jplayer_play_time" class="jp-play-time"></div>
						<div id="jplayer_total_time" class="jp-total-time"></div>
					</div>
					<div id="jplayer_playlist" class="jp-playlist"><ul></ul></div>
				</div>
			</div>
			<ul id="mp_albums" class="mp_albums jcarousel-skin">
				<li><img src="content/music/album1/thumb.jpg" alt="album1" /></li>
				<li><img src="content/music/album2/thumb.jpg" alt="album2" /></li>
			</ul>
		</div>
        <!-- END OF MPPLAYER -->
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
