<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Inspiration</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="The Organizations and the People who have inspired and contributed to us indirectly" />
<meta name="keywords" content="inspiration, thanks, credits, organizations"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Sponsor -->
<link rel="stylesheet" type="text/css" href="css/jqueryflip.css" />
<script type="text/javascript" src="js/jqueryflip/jquery.min.js"></script>
<script type="text/javascript" src="js/jqueryflip/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jqueryflip/jquery.flip.min.js"></script>
<script type="text/javascript" src="js/jqueryflip/jquery.flipscript.js"></script>

</head>
<body>
<div class="bg_png">

<div id="main">
<!-- header begins -->
<div id="header">
	<div id="macmenu">
    <ul id="macmenu_nav">
	<li class="current"><a href="/">Home</a></li>
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
    	<div class="text" style="background:#f8f8f8url(img/jqueryflip/page_bg.gif) repeat-x bottom;">
            <div style="height:10px"></div>
        <!-- START OF SPONSERS -->

        <div class="jqueryflip">
         <h1 style="font: 39px Tahoma, Helvetica, Arial, Sans-Serif; text-align: center;color: #222; text-shadow: 0px 2px 3px #555;">Mentor's Wall</h1>

         <?php
            // Each sponsor is an element of the $sponsors array:
            $sponsors = array(
            	array('facebook','The biggest social network in the world.','http://www.facebook.com/'),
            	array('adobe','The leading software developer targeted at web designers and developers.','http://www.adobe.com/'),
            	array('microsoft','One of the top software companies of the world.','http://www.microsoft.com/'),
            	array('sony','A global multibillion electronics and entertainment company ','http://www.sony.com/'),
            	array('dell','One of the biggest computer developers and assemblers.','http://www.dell.com/'),
            	array('ebay','The biggest online auction and shopping websites.','http://www.ebay.com/'),
            	array('digg','One of the most popular web 2.0 social networks.','http://www.digg.com/'),
            	array('google','The company that redefined web search.','http://www.google.com/'),
            	array('ea','The biggest computer game manufacturer.','http://www.ea.com/'),
            	array('mysql','The most popular open source database engine.','http://www.mysql.com/'),
            	array('hp','One of the biggest computer manufacturers.','http://www.hp.com/'),
            	array('yahoo','The most popular network of social media portals and services.','http://www.yahoo.com/'),
            	array('cisco','The biggest networking and communications technology manufacturer.','http://www.cisco.com/'),
            	array('vimeo','A popular video-centric social networking site.','http://www.vimeo.com/'),
            	array('canon','Imaging and optical technology manufacturer.','http://www.canon.com/')
            );

            // Randomizing the order of sponsors:
            shuffle($sponsors);
         ?>

         <div id="main">
         	<div class="sponsorListHolder">

                 <?php
         			// Looping through the array:
         			foreach($sponsors as $company)
         			{
         				echo'
         				<div class="sponsor" title="Click to flip">
         					<div class="sponsorFlip">
         						<img src="img/jqueryflip/sponsors/'.$company[0].'.png" alt="More about '.$company[0].'" />
         					</div>

         					<div class="sponsorData">
         						<div class="sponsorDescription">
         							'.$company[1].'
         						</div>
         						<div class="sponsorURL">
         							<a href="'.$company[2].'">'.$company[2].'</a>
         						</div>
         					</div>
         				</div>

         				';
         			}
         		?>

             	<div class="clear"></div>
             </div>
         </div>

         <p class="note">None of these companies are actually sponsors of Emprovise.</p>
        </div>

        <!-- END OF SPONSERS -->
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
