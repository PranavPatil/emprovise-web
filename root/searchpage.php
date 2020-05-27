<?php

include("lib/sphider/sphider_search.php");
$adv = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Search Results</title>
<meta name="description" content="Search Results" />
<meta name="keywords" content="search, find, results, page"/>
<link rel="shortcut icon" type="image/x-icon" href="img/globals/emproviseicon.ico" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/mac-menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/search-box.css" type="text/css" media="screen" />

<!-- Sphider -->
  <!-- suggest script -->
	<style type="text/css">@import url("admin/sphider/include/js_suggest/SuggestFramework.css");</style>
	<script type="text/javascript" src="admin/sphider/include/js_suggest/SuggestFramework.js"></script>
	<script type="text/javascript">window.onload = initializeSuggestFramework;</script>
  <!-- /suggest script -->

<!-- Search Page -->
<link rel="stylesheet" href="css/searchpage.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/macstyle.css"   type="text/css" media="screen" />

<!--
<script src="js/searchbox/jquery.js" type="text/javascript"></script>
<script src="js/searchbox/rails.js" type="text/javascript"></script>
-->

<script type="text/javascript">

      if(history.pushState) {

        $(document).ready(function() {
          $('#support').hide();
        })

        function update(url) {
          $('#loading').slideToggle('fast', function() {
            $.ajax({
              url: url,
              success: function(html) {
                $('#loading').slideToggle('fast');
                $('#searchcontent').html(html);
              }
            })
          });
        }

        $('.pagination a').live('click', function() {
          var href = $(this).attr('href');
          history.pushState({ path: href }, '', href);
          update(href);

          return false;
        });

        $('form').live('submit', function() {
          var form = $(this);
          var url = form.attr('action') + '?' + form.serialize();

          history.pushState({ path: url }, '', url);
          update(url);

          return false;
        });

        $(window).bind('popstate', function(event) {
          var state = event.originalEvent.state;

          if(state)
            update(state.path)
        })

      }

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
    	<div class="text" style="background:#b8bbc0 url(img/searchpage/background.png) repeat top left;">

        <!-- START OF SEARCH PAGE -->

  <div id="searchpage">
    <h1>Search Results</h1>
    <form action="searchpage.php" method="get" class="ajax-results skinned-form-controls skinned-form-controls-mac">
      <input name="query" id="query" placeholder="Search again" value="<?php   print quote_replace($query);?>" type="text" columns="2" autocomplete="off" delay="1500">
      <input id="button" value="<?php print $sph_messages['Search']?>" type="submit">

<!-- START OF DISPLAY ADVANCED SEARCH -->

<?php  if ($adv==1 || $advanced_search==1) {
?>
	<table class="advancesearch" align="center">
	<tr>
            <td nowrap="nowrap">
               <input type="radio" name="type" value="and"
                   <?php print $type=='and'?'checked':''?> /><span><?php print $sph_messages['andSearch']?></span>
            </td>
            <td nowrap="nowrap">
               <input type="radio" name="type" value="or"
                   <?php print $_REQUEST['type']=='or'?'checked':''?> /><span><?php print $sph_messages['orSearch']?></span>
            </td>
            <td nowrap="nowrap">
               <input type="radio" name="type" value="phrase"
                   <?php print $_REQUEST['type']=='phrase'?'checked':''?> /><span><?php print $sph_messages['phraseSearch']?></span>
            </td>
            <td nowrap="nowrap">
                <?php print $sph_messages['show']?>
			<select name='results'>
		      <option <?php  if ($results_per_page==10) echo "selected";?>>10</option>
			  <option <?php  if ($results_per_page==20) echo "selected";?>>20</option>
		      <option <?php  if ($results_per_page==50) echo "selected";?>>50</option>
		      <option <?php  if ($results_per_page==100) echo "selected";?>>100</option>
			</select>

	  	<?php print $sph_messages['resultsPerPage']?>
            </td>
        </tr>
	</table>
<?php }?>

<!-- END OF DISPLAY ADVANCED SEARCH -->

<!-- START OF DISPLAY CATEGORIES -->

    <?php if ($catid<>0){?>
		<?php if ($adv != 1 && $advanced_search != 1){ ?> <br /><br /> <?php }?>
	<center><b><?php print $sph_messages['Search']?></b>: <input type="radio" name="category" value="<?php print $catid?>"/><span><?php print $sph_messages['Only in category']?> "<?php print $tpl_['category'][0]['category']?>'"</span> <input type="radio" name="category" value="-1" checked /><span><?php print $sph_messages['All sites']?></span></center>
    <?php  }?>
	<input type="hidden" name="search" value="1">
    </form>

    <?php if ($has_categories && $search==1 && $show_categories){?>
	<a href="searchpage.php"><?php print $sph_messages['Categories']?></a>
    <?php  }?>

<!-- END OF DISPLAY CATEGORIES -->

<!-- START OF DISPLAYING SEARCH RESULTS -->

<?php if ($search_results['did_you_mean']){?>
    <div id="did_you_mean">
	<?php echo $sph_messages['DidYouMean'];?>: <a href="<?php print 'searchpage.php?query='.quote_replace(addmarks($search_results['did_you_mean'])).'&search=1'?>"><?php print $search_results['did_you_mean_b']; ?></a>?
    </div>
    <br />
<?php  }?>

<?php if ($search_results['ignore_words']){?>
    <div id="common_report">
	<?php while ($thisword=each($ignore_words)) {
		$ignored .= " ".$thisword[1];
	}
	$msg = str_replace ('%ignored_words', $ignored, $sph_messages["ignoredWords"]);
	echo $msg; ?>
    </div>
    <br />
<?php  }?>

<?php if ($search_results['total_results']==0){?>
    <div id ="result_report">
	<?php
            $msg = str_replace ('%query', $ent_query, $sph_messages["noMatch"]);
            echo $msg;
	?>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <br />
<?php  }?>

<?php if ($total_results != 0 && $from <= $to){?>
	<p>
	<?php
	$result = $sph_messages['Results'];
	$result = str_replace ('%from', $from, $result);
	$result = str_replace ('%to', $to, $result);
	$result = str_replace ('%all', $total_results, $result);
	$matchword = $sph_messages["matches"];
	if ($total_results== 1) {
		$matchword= $sph_messages["match"];
	} else {
		$matchword= $sph_messages["matches"];
	}

	$result = str_replace ('%matchword', $matchword, $result);
	$result = str_replace ('%secs', $time, $result);
	echo $result;
	?>
	</p>
<?php  }?>
    <br />

    <div id="searchcontent">

  <?php if (isset($qry_results)) {  ?>
  <div id="table">
    <div class="left"></div>
    <table>
        <tbody>
	<?php foreach ($qry_results as $_key => $_row){
            $last_domain = $domain_name;
            extract($_row);
            if ($show_query_scores == 0) {
		$weight = '';
            } else {
		$weight = "[$weight%]";
            }
	?>
        <tr>
          <td>
            <?php  if ($domain_name==$last_domain && $merge_site_results == 1 && $domain == "") {?>
            <div class="idented">
            <?php }?>
            <a href="<?php print $url?>" class="pagetitle">	<?php print ($title?$title:$sph_messages['Untitled'])?></a><br/>
            <div class="pageurl"><?php print $url2?> - <?php print $page_size?></div>
            <div class="pagedescription"><?php print $fulltxt?></div>
            <?php  if ($domain_name==$last_domain && $merge_site_results == 1 && $domain == "") {?>
		[ <a href="<?php print 'searchpage.php?query='.quote_replace(addmarks($query)).'&search=1&results='.$results_per_page.'&domain='.$domain_name?>">More results from <?php print $domain_name?></a> ]
            </div>
            <?php }?>
          </td>
        </tr>
    <?php  }?>
    </tbody></table>
    <div class="right"></div>
  </div>
  <?php }?>

<!-- links to other result pages-->
<?php if (isset($other_pages)) {
	if ($adv==1) {
		$adv_qry = "&adv=1";
	}
	if ($type != "") {
		$type_qry = "&type=$type";
	}
?>

  <div class="pagination">

    <?php if ($start >1){?>
                <a href="<?php print 'searchpage.php?query='.quote_replace(addmarks($query)).'&start='.$prev.'&search=1&results='.$results_per_page.$type_qry.$adv_qry.'&domain='.$domain?>" class="previous_page" rel="prev start">&#8592; Previous</a>
    <?php  } else { ?>
                <!-- <span class="previous_page disabled">�? Previous</span> -->
                <span class="previous_page disabled">&#8592; Previous</span>
    <?php  }?>

    <?php  foreach ($other_pages as $page_num) {
	if ($page_num !=$start){?>
		<a href="<?php print 'searchpage.php?query='.quote_replace(addmarks($query)).'&start='.$page_num.'&search=1&results='.$results_per_page.$type_qry.$adv_qry.'&domain='.$domain?>"><?php print $page_num?></a>
	<?php } else {?>
		<em><?php print $page_num?></em>
	<?php  }?>
    <?php  }?>

    <?php if ($next <= $pages){?>
		<a href="<?php print 'searchpage.php?query='.quote_replace(addmarks($query)).'&start='.$next.'&search=1&results='.$results_per_page.$type_qry.$adv_qry.'&domain='.$domain?>" class="next_page" rel="next">Next &#8594;</a>
    <?php  } else { ?>
                <span class="next_page disabled">Next &#8594;</span>
    <?php  }?>

  </div>

<?php }?>

<?php if ($total_results != 0 && $from <= $to){?>
  <div class="page-entries">
    Displaying results <b><?php print $from?>&nbsp;-&nbsp;<?php print $to?></b> of <b><?php print $total_results?></b> in total
  </div>
<?php }?>

<!-- END OF DISPLAYING SEARCH RESULTS -->

    </div>
  </div>

        <!-- END OF SEARCH PAGE -->
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
