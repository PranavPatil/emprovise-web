<?php

   $subpage = isset($_POST['subpage']) ? $_POST['subpage']: NULL;

   if($subpage == NULL) {
      $subpage = isset($_GET['subpage']) ? $_GET['subpage']: NULL;
   }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Presentations</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keywords" content="presentations, keynote, slide, topics, research, programming, theory"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Slide Side Menu -->
<link rel="stylesheet" href="css/slide-smenu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/textglow.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/slidesmenu/jquery.js"></script>
<script type="text/javascript" src="js/slidesmenu/jquery_002.js"></script>
<script type="text/javascript" src="js/slidesmenu/theme-js.js"></script>

<script type="text/javascript" src="js/slidesmenu/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/slidesmenu/jquery-ui.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

  var curmenu = null;
  var curhighlight = null;

  $('#sidebar a').live('hover', function(e) {

  	  e.preventDefault();
	  var pptid = e.target.id.substr(e.target.id.length - 3);
	  var pptmenu = "#pptmenu" + pptid;

	  $mainContent = $("#mainmenu");
	  $pptContent =  $(pptmenu);

	  if(e.type == 'mouseenter' && curmenu != pptmenu) {

         if(curmenu != null) {

    	   $curContent = $(curmenu);

		   $mainContent.stop(false, true).animate({
              opacity: 0,
              left: '-=28'    // Previous was +=32
           }, 500, function() {
              $curContent.hide();
           });

		   setTimeout(function() {

    		 $pptContent.css("display", "inherit");

             $mainContent.stop(false, true).animate({
                opacity: 1,
                left: '+=28'
             }, 500);

    		 curmenu = pptmenu;
    	   },500);
		 }
		 else {
   		   $pptContent.css("display", "inherit");

           $mainContent.stop(false, true).animate({
              opacity: 1,
              left: '+=28'
           }, 500);

   		   curmenu = pptmenu;
		 }
	  }
//	  else if(e.type == 'mouseleave') {	  }

  });

  $('#sidebar a').click(function() {

	  var pptid = $(this).attr('id').substr($(this).attr('id').length - 3);
	  var pptmenu = "#pptmenu" + pptid;

	  if(curhighlight != null) {
		  $curhighobject =  $("#" + curhighlight);
		  $curhighobject.parent('li').removeClass('current_page_parent');
  	      $(pptmenu).hide();
		  curhighlight = null;
	  }

	  $(this).parent('li').addClass('current_page_parent');
	  $(pptmenu).show();
	  curhighlight = $(this).attr('id');
   });

	<?php
		if($subpage != NULL) {

			print("\n\n\t var activeppts = [];");

			print("\n\n\t $(\"#mainmenu div[id^=pptmenu-]\").each(function(){");
			print("\n\t\t activeppts.push($(this).attr('id').substring(8));");
			print("\n\t });");

			print("\n\n\t var pageid = activeppts[". $subpage ."];");

			print("\n\n\t var pageelement = '#sidebar #pptid-' + pageid;");
			print("\n\n\t var id = $(pageelement).closest('li').parent().closest('li').attr('id');");
			print("\n\t $(\"#\"+id).children(\"h2:first\").click();");
			print("\n\t $(pageelement).click();");
		}
	?>
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
    	<div class="text" style="background:#000 url(img/slidesmenu/backgroundpic.png) repeat top left;">
            <div style="height:10px"></div>

        <!-- START OF PRESENTATIONS MENU -->

<div id="slide-smenu">
<div id="blog" class="single">
<br />
<h1 class="insetType" style="font-size:36px; text-align:center;
	padding: 0px; background:transparent left top no-repeat;">Presentations</h1>
<br /><br />

<div id="wrapper">
  <div id="postMid">
  <div id="sidebar" style="height:450px;">

<ul>
<li id="menu-1" class="widget widget_pages"><h2 class="widgettitle active">Research</h2>
  <ul>
	<li class="page_item page-item-3"><a id="pptid-1" href="#" title="Cloud Computing">Cloud Computing</a></li>
    <li class="page_item page-item-4"><a id="pptid-2" href="#" title="Hacking">Hacking</a></li>
    <li class="page_item page-item-8"><a id="pptid-3" href="#" title="Information Retrival">Information Retrival</a></li>
    <li class="page_item page-item-5"><a id="pptid-4" href="#" title="Language Processing">Language Processing</a></li>
    <li class="page_item page-item-6"><a id="pptid-5" href="#" title="User Interface">User Interface</a></li>
  </ul>
</li>


<li id="menu-2" class="widget widget_categories"><h2 class="widgettitle active">Theory</h2>
  <ul>
	<li class="cat-item cat-item-6"><a id="pptid-21" style="padding-left: 10px;" href="#" title="SSL">SSL</a></li>
	<li class="cat-item cat-item-10"><a id="pptid-22" style="padding-left: 10px;" href="#" title="Networking Basics">Networking Basics</a></li>
	<li class="cat-item cat-item-16"><a id="pptid-23" style="padding-left: 10px;" href="#" title="Security Overview">Security Overview</a></li>
	<li class="cat-item cat-item-17"><a id="pptid-24" style="padding-left: 10px;" href="#" title="Google Search Engine">Google Search Engine</a></li>
	<li class="cat-item cat-item-8"><a id="pptid-25" style="padding-left: 10px;" href="#" title="Artificial Intelligence">Artificial Intelligence</a></li>
  </ul>
</li>


<li id="menu-3" class="widget widget_archive"><h2 class="widgettitle active">Programming</h2>
  <ul id="article18">
	<li><a id="pptid-41" style="padding-left: 10px;" href="#" title="Java Programming">Java Programming</a></li>
	<li><a id="pptid-42" style="padding-left: 10px;" href="#" title="Java Enterprise Edition">J2EE</a></li>
	<li><a id="pptid-43" style="padding-left: 10px;" href="#" title="Spring Framework">Spring Framework</a></li>
	<li><a id="pptid-44" style="padding-left: 10px;" href="#" title="Struts2 Framework">Struts2 Framework</a></li>
	<li><a id="pptid-45" style="padding-left: 10px;" href="#" title="Java Messaging Service">JMS</a></li>
	<li><a id="pptid-46" style="padding-left: 10px;" href="#" title="Java Design Patterns">Java Design Patterns</a></li>
  </ul>
</li>

<li id="text-300248315" class="widget_text"></li>

</ul>
</div>

<!--============================================ ANCHOR CONTENT ========================================================-->
<div id="mainmenu" class="post-98 post hentry category-jquery" >

<div id="pptmenu-41" style="display:none;">

		<div class="entry">
            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=ooprinciples">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE1: Object Oriented Programming Concepts</h2></a>
				<p>Includes basics of Object Oriented Concepts, Encapsulation, Association, Aggregation, Composition, Abstraction,
                Generalization, Specialization, Abstract Classes, Interfaces, Polymorphism, Overloading, Overriding, Inheritence,
                Access Modifiers, Constructors, This, Super, Static and Final keywords.<br /><br /></p>
            </div>
            <br />

            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=javabasics">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE2: Java Basics</h2></a>
				<p>Introduces core building blocks of Java such as datatypes and variables, method overloading, overriding, constructors, interfaces, scopes, modifiers, type conversions, initialization, packages, arrays, exception handling, assertions, static and non-static classes, inner classes, wrapper classes, autoboxing, enumeration, file handling and, serialization.<br><br></p>
            </div>
			<br />

            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=javaadvance">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE3: Java Advance</h2></a>
				<p>Presents with the advance features of Java alongwith features in Java1.5. The topics discuessed include garbage collection, object finalization, string pattern matching, multithreading, synchronization, thread states, generics, wildcards, equals and hashcode methods, comparable and comparator interface, collections, maps, and lists.<br /><br /></p>
            </div>
			<br />
		</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>

<div id="pptmenu-42" style="display:none;">

		<div class="entry">
            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=javaservlets">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE4: Java Servlets</h2></a>
				<p>Description of Java Servlet Container and API. Topics included are servlet container, servlet interface, httpservlet, servlet life cycle, servletconfig, servletcontext, requestdispatcher, web container, servlet mapping, listeners, error handling, session, httpsession, authentication, security contraint, multithreaded servlet model, and variable scopes .<br /><br /></p>
            </div>
            <br />

            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=jsp">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE5: Java Server Pages</h2></a>
				<p>Discussion of the Java Server Pages container, tags and syntax. Topics covered are directives, declarations, scriptlets, expressions, actions, jsp life cycle, page directives, scripting elements, implicit variables, page scopes, static and dynamic inclusion, actions for javabeans, custom tags, tag mapping, tag prefix, tag library descriptor, tag extension api and tagsupport classes.<br /><br /></p>
            </div>
			<br /><br />
		</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>

<div id="pptmenu-43" style="display:none;">

		<div class="entry">
            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=springbasics">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE6: Spring Basics</h2></a>
				<p>Introduces Spring 2.0 basic modules and features. The keynote covers brief description of spring modules, inversion of control, beans, dependency injection, ascpect oriented programming, pointcut, advice, jointpoint, spring container, beanfactory, applicationcontext, life cycle of bean, constructor or property bean injection, autowiring, bean scopes, proxyfactorybean, autoproxying and aspectj features.<br><br></p>
            </div>
            <br />

            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=enterprisespring">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE7: Enterprise Spring</h2></a>
				<p>Overview of the basics of the Spring Framework 2.0. Topics included are Data Access Objects, Spring Data Access Templates, Spring DAO Support Classes, JNDI Datasource and Connection Pool Configuration, JDBC Templates, Named Parameters, Spring and Hiberante Integration, Hibernate Templates, LocalSessionFactoryBean, Annotated Domain Objects, and Spring Caching Module.<br /><br /></p>
            </div>
			<br /><br />
		</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>

<div id="pptmenu-44" style="display:none;">

		<div class="entry">
            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=struts2">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE8: Struts2 Basics</h2></a>
				<p>Introduction to Struts2 Framework with its MVC Components and Interceptors. It also addresses the OGNL expression language, Declarative Architecture, Action class, input validation process, data transfer, Action Invocation, Data Transfer and workflow interceptors, interceptor declaration, valuestack and multi valued requests.<br><br></p>
            </div>
            <br />

            <div class="descbox">
            <a href="/slides/slideplayer.php?slidename=struts2advance">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE9: Struts2 Advance</h2></a>
				<p>Building up on top of Struts2 basics with some advance features of struts2. The features discussed are the actioncontext, data and control tags, predefined result types, spring integration, freemarker and velocity integration, struts2 validation framwork, field and non field validators and, custom validators.<br /><br /></p>
            </div>
			<br /><br />
		</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>

<div id="pptmenu-45" style="display:none;" >

		<div class="entry">
            <div class="descbox">
            <a href="#">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE10: Java Messaging Service</h2></a>
				<p>Coming up soon.<br /><br /></p>
            </div>
			<br /><br />
		</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>

<div id="pptmenu-46" style="display:none;" >

		<div class="entry">
            <div class="descbox">
            <a href="#">
			<h2 style="color: #fff; text-shadow: 1px 1px 6px #fff;">KEYNOTE11: Java Design Patterns</h2></a>
				<p>Coming up soon.<br><br></p>
            </div>
			<br /><br />
		</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>

</div>
<!--============================================ END OF ANCHOR CONTENT ==================================================-->

  </div>
</div>


</div>
</div>

        <!-- END OF PRESENTATIONS MENU -->
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
