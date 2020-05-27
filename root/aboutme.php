<?php

   $subpage = isset($_POST['subpage']) ? $_POST['subpage']: NULL;

   if($subpage == NULL) {
      $subpage = isset($_GET['subpage']) ? $_GET['subpage']: 0;
   }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>About Me</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keywords" content="about me, pranav, patil, java, webservices"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- About Me Booklet -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script src="js/booklet/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/booklet/jquery.booklet.1.1.0.min.js" type="text/javascript"></script>

<link href="css/jquery.booklet.1.1.0.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="css/booklet.css" type="text/css" media="screen"/>

<script src="js/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon/ChunkFive_400.font.js" type="text/javascript"></script>
<script src="js/cufon/Note_this_400.font.js" type="text/javascript"></script>
<script src="js/cufon/qarmic-sans.cufonfonts.js" type="text/javascript"></script>
<script src="js/cufon/dunkirk.cufonfonts.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('.book_wrapper p,.b-counter', {fontFamily:'Dunkirk', fontSize:'24px'});
	Cufon.replace('.book_wrapper h1', {fontFamily:'Dunkirk', fontSize:'34px'});
	Cufon.replace('.book_wrapper a', {hover:true});
	Cufon.replace('.booktitle', {textShadow: '1px 1px #C59471', fontFamily:'ChunkFive'});
	Cufon.replace('.reference a', {textShadow: '1px 1px #C59471', fontFamily:'ChunkFive'});
	Cufon.replace('.loading', {textShadow: '1px 1px #000', fontFamily:'ChunkFive'});
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
	<li><a href="#">Entertainment</a>
		<ul>
			<li><a href="/music.php">Music</a></li>
			<li><a href="/video.php">Video</a></li>
		</ul>
	</li>
	<li class="current"><a href="/aboutme.php">About</a></li>
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
    	<div class="text" style="background:#ccc url(img/booklet/pages/wood.jpg) repeat top left;">
            <div style="height:10px"></div>
        <!-- START OF ABOUTME BOOKLET -->

        <div class="bookframe">
		<center><h1 class="booktitle" style="background:none; width: 300px; text-align:left;">About Me</h1></center>
		<div class="book_wrapper">
			<a id="next_page_button"></a>
			<a id="prev_page_button"></a>
			<div id="loading" class="loading">Loading pages...</div>
			<div id="mybook" style="display:none;">
				<div class="b-load">
					<div class="subpage">
						<h1>About Me</h1>
						<img src="img/booklet/content/me.png" alt="" />
                        <br />
					</div>
					<div class="subpage">
						<img src="img/booklet/content/university.png" alt="" />
						<img src="img/booklet/content/college.png" alt="" />
					</div>
					<div class="subpage">
						<h1>Bachelor in Computer</h1>
						<p>I studied in College of Computer to embark my career in
              Software world. Although, I was not great at studies,
                            but was fascinated with its computer applications. It started with C and C++,
                            evolved with Visual Basic and SQL and then was revolutionised by Java and
                            J2ee. On the down side I ignored the bookish concepts winding me with below average
                            grades.</p>
						<a href="https://en.wikipedia.org/wiki/University" target="_blank" class="article">University</a>
						<a href="https://en.wikipedia.org/wiki/College" target="_blank" class="demo">College</a>
					</div>
					<div class="subpage">
						<h1>Online Recruitment System</h1>
						<img src="img/booklet/content/ors.png" alt="" />
					</div>
					<div class="subpage">
						<h1>Final Year Project</h1>
						<p>Online Recruitment System was designed to automate the
                           candidate selection process for companies. Employers can
                           create tests on various topics with customized settings,
                           candidates apply online and take the tests, allowing
                           employers to review candidate info along with test results.
                           Features such as accessibility control, automated interview
                           emails, backups, log maintenance, concurrency are key ones.</p>
					</div>
					<div class="subpage">
						<h1>Sun Certified Professional</h1>
                        <br />
   						<img src="img/booklet/content/suncert.png" alt="" />
   						<img src="img/booklet/content/suncertlogo.png" alt="" />
					</div>
					<div class="subpage">
						<h1>SCJP</h1>
						<p>I develop a strange attachment to Java language after experiencing
                        its strong object oriented approach towards development. It not only
                        simplified the implementation but encouraged endless customization and
                        reuse. Being an opensource platform made it my preferred development
                        language. After the ORS project, and having worked on J2ee, I believed
                        Java to have a great potential in developing customized software. I
                        studied for SCJP thus becoming a java professional. </p>
					</div>
					<div class="subpage">
                        <h1>Software Infotech</h1>
                        <br />
   						<img src="img/booklet/content/softwareinfotech.png" alt="" />
                        <br /><br />
						<a href="https://en.wikipedia.org/wiki/Software_company" target="_blank" class="article">Website</a>
					</div>
					<div class="subpage">
						<p>Software Infotech is a small software firm. The company is mainly oriented
               in designing business software primarly for small local market in India.
                           I was learning and exploring the software devlopment. After working on
                           development with Java Swing, I steered my attention towards linux, Mysql,
                           jasper reports, and adv java. Some of the amazing things I learned were
                           Samba Server, NFS, Core Swing and Jasper Reports.</p>
					</div>
					<div class="subpage">
                        <h1>Vero Software</h1>
                        <br />
						<img src="img/booklet/content/veroscreen.png" alt="" />
                        <br /><br />
						<a href="http://www.vero.com" target="_blank" class="article">Website</a>
					</div>
					<div class="subpage">
						<p>Vero Business Software meets the accounting requirements
                        of the Indian businessman and small scale industries. It allows
                        a basic set of accounting operations using a simplified user
                        interface, overlayed with some highly customizable features. Build
                        using Java Swing and MySQL as a backend, it runs in Windows, SUSE Linux,
                        Sun Solaris. Vero gained recognition of Sun Microsystems after being
                        audited by AppLabs, and is certified using the Java powered logo.</p>
					</div>
					<div class="subpage">
						<h1>The iRobot Create Project</h1>
						<img src="img/booklet/content/irobot.png" alt="" />
						<a href="articlepage.php?atitle=iRobot%20Create%20Project&apath=programming/irobot.html" target="_blank" class="article">Article</a>
					</div>
					<div class="subpage">
						<h1>A bit of Robotics</h1>
						<p>Robotics is always a field which I craved to work on and hence
                        got involved in the Roomba project to help out my friends AI project
                        as a learning opportunity. After initial driver failure with java
                        the project was developed in Python. Mission was to get the cookies
                        from one door and pass to another door evading 4 random obstacles.
                        The wall sensor plays a key role to traverse the wall alongwith the
                        left/right bump sensors to reposition the robot in case of obstacles.</p>
					</div>
					<div class="subpage">
						<h1>National Association of Certified Credit Counselors</h1>
						<img src="img/booklet/content/naccclogo.png" alt="" />
						<img src="img/booklet/content/nacccweb.png" alt="" />
					</div>
					<div class="subpage">
						<h1>NACCC Training Website</h1>
						<p>NACCC is a nonprofit professional organization
                        certifying Credit Counselors and Financial Counselors
                        throughout United States. NACCC Training is a web based
                        system designed to enable the registered Counselors to
                        access the training material, take mock exams, update their
                        contact info, take the certification exam, access exam
                        records and certificates, and renew them after every
                        2 years.
                        </p>
					</div>
					<div class="subpage">
						<h1>DollarBank</h1>
						<img src="img/booklet/content/banklogo.png" alt="" />
						<img src="img/booklet/content/bankoffice.png" alt="" />
						<a href="http://www.bank.com" target="_blank" class="article">Website</a>
					</div>
					<div class="subpage">
						<h1>Software Developer</h1>
						<p>DollarBank is one of the Main Banks in US and has
                        the world's largest financial services network,
                        spanning 200 countries. Dollar Mobile US strives in
                        providing mobile services such as SMS Banking,
                        NFC Payments, and P2P Transactions to its customers.
                        Some of the tasks involved were developing and exposing
                        webservices, security management and collaboration with
                        external teams. Over a year, I worked on projects such
                        as Google Wallet, Japan NFC, German IDA and Biado
                        HongKong.
                        </p>
					</div>
					<div class="subpage">
						<h1>Google Wallet Initiative</h1>
						<img src="img/booklet/content/googlewalletlogo.png" alt="" />
						<img src="img/booklet/content/googlewallet.png" alt="" />
						<a href="http://www.google.com/wallet/" target="_blank" class="article">Website</a>
					</div>
					<div class="subpage">
						<h1>CREAM Project</h1>
						<p>Google Wallet is a virtual wallet that stores
                        customer's payment information and allows making
                        payments securely using NFC technology both in-stores
                        as well as online. Google has a collaboration with
                        Dollarbank to add Dollar credit cards in its wallet.
                        DollarBank has exposed a set of webservices to add an
                        existing or to apply for a new credit card to add to
                        the wallet. The webservices are SOAP based using the
                        technologies such as JAX-WS, JAXB, CXF, Spring, Hibernate
                        and JFP a proprietary frame work of DollarBank.
                        </p>
					</div>
					<div class="subpage">
						<img src="img/booklet/content/mecologo.png" alt="Meco Engineering" />
						<img src="img/booklet/content/machshopappln.png" alt="" />
						<img src="img/booklet/content/drillmachine.png" alt="" />
					</div>
					<div class="subpage">
						<h1>MachShop Project</h1>
						<p>MachShop is a machine monitoring system which provides
                        remote access to construction drills and mining equipments,
                        power utilization and machine diagnostic data. The machine data
                        is collected using satellite connection and provided to customer
                        through MachShop website or MachShop APIs. MachShop offers
                        Machine status, Drilling alerts, Heat maps, and much more.
                        The services are SOAP and RESTful using the technolgies JAX-WS,
                        RestEasy, Spring framework.
                        </p>
						<a href="http://www.machine.com" target="_blank" class="article">Website</a>
					</div>
					<div class="subpage">
						<h1>"Stay Hungry, Stay Foolish"</h1>
						<img src="img/booklet/content/minion.png" alt="" />
                        <br />
					</div>
				</div>
			</div>
		</div>

        <!-- The JavaScript -->

        <script type="text/javascript">
			$(function() {
				var $mybook 		= $('#mybook');
				var $bttn_next		= $('#next_page_button');
				var $bttn_prev		= $('#prev_page_button');
				var $loading		= $('#loading');
				var $mybook_images	= $mybook.find('img');
				var cnt_images		= $mybook_images.length;
				var loaded			= 0;
				//preload all the images in the book,
				//and then call the booklet plugin

				$mybook_images.each(function(){
					var $img 	= $(this);
					var source	= $img.attr('src');
					$('<img/>').load(function(){
						++loaded;
						if(loaded == cnt_images){
							$loading.hide();
							$bttn_next.show();
							$bttn_prev.show();
							$mybook.show().booklet({
								name:               null,                            // name of the booklet to display in the document title bar
								width:              800,                             // container width
								height:             500,                             // container height
								speed:              600,                             // speed of the transition between pages
								direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
								startingPage:       <?php echo $subpage; ?>,                               // index of the first page to be displayed
								easing:             'easeInOutQuad',                 // easing method for complete transition
								easeIn:             'easeInQuad',                    // easing method for first half of transition
								easeOut:            'easeOutQuad',                   // easing method for second half of transition

								closed:             true,                           // start with the book "closed", will add empty pages to beginning and end of book
								closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
								closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
								closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
								closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
								covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

								pagePadding:        10,                              // padding for each page wrapper
								pageNumbers:        true,                            // display page numbers on each page

								hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
								overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
								tabs:               false,                           // adds tabs along the top of the pages
								tabWidth:           60,                              // set the width of the tabs
								tabHeight:          20,                              // set the height of the tabs
								arrows:             false,                           // adds arrows overlayed over the book edges
								cursor:             'pointer',                       // cursor css setting for side bar areas

								hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
								keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
								next:               $bttn_next,          			// selector for element to use as click trigger for next page
								prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page

								menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
								pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
								chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

								shadows:            true,                            // display shadows on page animations
								shadowTopFwdWidth:  166,                             // shadow width for top forward anim
								shadowTopBackWidth: 166,                             // shadow width for top back anim
								shadowBtmWidth:     50,                              // shadow width for bottom shadow

								before:             function(){},                    // callback invoked before each page turn animation
								after:              function(){}                     // callback invoked after each page turn animation
							});
							Cufon.refresh();
						}
					}).attr('src',source);
				});

			});
        </script>

        </div>

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
