<?php
   require 'content/filelist.php';

   $filepath = isset($_POST['filepath']) ? $_POST['filepath']: NULL;

   if($filepath == NULL) {
	   $filepath = 'src';
   }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>projects</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Source code for some projects on various topics in different programming languages" />
<meta name="keywords" content="projects, source, code, programming, view, languages, java, c, c++, python, sql, csharp, jsp"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Gradient Table -->
<link rel='stylesheet' type='text/css' href='css/gradient-table.css' />

<!-- GitHub Slider  -->
<script src="js/treeslider/jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="js/treeslider/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/treeslider/httprequest.js" type="text/javascript"></script>
<script type="text/javascript">

function generatePathInfo(a)
{
   var splitty = a.split('/');
   var text = "";
   var path = "";

   for (i=0; i<splitty.length; i++) {

       path = path + splitty[i];
	   text = text  + '<b><a href="' + path + '" class="js-slide-to">' + splitty[i] + '</a></b> / ';
       path = path + "/";
   }

   return text;
}

$(document).ready(function() {

  $('#treeslider a').live('click', function(e) {

	if($(this).attr('name') == 'file') {
//      alert($(this).attr('href'));

	  e.preventDefault();
	  $.postGo("srcviewer.php",
	        { vfile: $(this).attr('href') });
	}
	else {

 	  var index = $("#treeslider #pathinfo a").index(this);

      // Get the Dir List from Server using AJAX
      $.ajax({
        type: "GET",
        url: "content/dirdetails.php",
        data: "dir=" + $(this).attr('href'),
        dataType: "html",
        success: function(html){
	      $("#dirdetails").html(html); },
	    error: function() { if(!arguments) alert(arguments[2]); }
      });

      // Update the Directory PathInfo
      var data = generatePathInfo($(this).attr('href'));
	  $('#pathinfo').html(data);

  	  // Code for Animation
	  $mainContent = $("#frames"),
      $pageWrap    = $("#treeslider"),
	  baseHeight   = 0;

	  $pageWrap.height($pageWrap.height());
      baseHeight = $pageWrap.height() - $mainContent.height();

	  $mainContent.fadeOut(100, function() {

           if(index > -1 ) {
		 	  $mainContent.show("slide", { direction: "left" }, 200);
	       }
		   else {
		      $mainContent.show("slide", { direction: "right" }, 200);
           }

           $mainContent.fadeIn(100, function() {
              $pageWrap.animate({
                 height: baseHeight + $mainContent.height() + "px"
              });
           });
      });

	}

	return false

  });

  $('#frames').ready(initialLoading());

});

function initialLoading(){

	$('#pathinfo a').attr("href", "<?php echo $filepath; ?>");
	$('#pathinfo a').click();
}


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
	}
	#pathinfo a{
		color:#0084C7;
		text-decoration:none;
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

         <div id="pathinfo" data-path="/">
           <b><?php printf("<a href=\"src\" class=\"js-slide-to\">src</a>"); ?></b> /
         </div>

        <div id="frames">

         <table id="gradient-table" summary="Meeting Results">
            <thead>
            	<tr>
                	<th scope="col" col width="5%">Sr</th>
                    <th scope="col" col width="35%">Name</th>
                    <th scope="col" col width="20%" style="padding-left:80px;">Size</th>
                    <th scope="col" col width="5%"> </th>
                    <th scope="col" col width="35%">Age</th>
                </tr>
            </thead>
            <tfoot>
            	<tr>
                	<td colspan="5">Give background color to the table cells to achieve seamless transition</td>
                </tr>
            </tfoot>
            <tbody id="dirdetails">

            <?php

			  $dirlist = getFileList("content/src/", false);
			  sort($dirlist);

              foreach ($dirlist as $value) {
				  printf("<tr>\n");

				  if($value['size'] > 0) {
 				     printf("<td> <img alt=\"text file\" height=\"16\" src=\"img/gradient-table/txt.png\" width=\"16\" /></td>\n");
 				     printf("<td>\n");
 				     printf("<a href=\"src/%s\" class=\"js-slide-to\">", $value['name']);
 				     printf("%s</a>\n</td>\n", $value['name']);
					 printf("<td style=\"text-align:right\">%s bytes </td>\n", number_format($value['size']));
				  }
				  else {
 				     printf("<td> <img alt=\"directory\" height=\"16\" src=\"img/gradient-table/dir.png\" width=\"16\" /></td>\n");
 				     printf("<td>\n");
 				     printf("<a href=\"src/%s\" class=\"js-slide-to\">", $value['name']);
 				     printf("%s</a>\n</td>\n", $value['name']);
				     printf("<td> </td>\n");
				  }

				  printf("<td> </td>\n<td>%s</td>\n", date("F j, Y, g:i a (T)", $value['lastmod']));
				  printf("</tr>\n");
              }
			?>
            </tbody>
         </table>

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
