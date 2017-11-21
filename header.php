<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/content/favicon.html" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="title" content="" />
<meta name="description" content="" />
<title>
<?php bloginfo('name'); ?>
</title>
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' )?>/styles/blue.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' )?>/styles/inner.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' )?>/styles/nivo-slider.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' )?>/styles/noscript.css" rel="stylesheet" type="text/css" id="noscript" media="screen,all"  />
<script type="text/javascript" src="<?php bloginfo( 'template_url' )?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' )?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' )?>/js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
var $jts = jQuery.noConflict();
$jts(window).load(function() {
	$jts('#slider2').nivoSlider({
		effect:'random', //Specify sets like: 'fold,fade,sliceDown'
		slices:15,
		animSpeed:500, //Slide transition speed
		pauseTime:6000,
		directionNav:true, //Next &amp; Prev
		startSlide:0 //Set starting Slide (0 index)
	});
});
</script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' )?>/js/dropdown.js"></script>
<?php wp_head(); ?>
</head>
<body>
<div class="main_body">
<div class="main_body_inner">
<div class="topbar_banner">
  <div class="topbar_lan_social">
    <div class="topbar_wrapper">
      <div class="top_language">
        <div class="language "> <span>Language:</span>
          <div style="float: left; margin: 0px 15px 0 0;">
            <?=qtrans_generateLanguageSelectCode('dropdown');?>
          </div>
        </div>
      </div>
      <div class="flag"> </div>
      <div class="top_bar_col last_col">
        <div class="branding_left">
          <ul>
            
            <!--                    <li><a class="icons soundcloud" href="#">soundcloud</a></li>

                    <li><a class="icons youtube" href="#">youtube</a></li>

                    <li><a class="icons google_plus" href="#">google_plus</a></li>-->
            
            <li><a class="icons facebook" href="https://www.facebook.com/share.education.bangladesh">facebook</a></li>
            
            <!--                    <li><a class="icons twitter" href="#">twitter</a></li>

                    <li><a class="icons linkedin" href="#">linkedin</a></li>-->
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="banner">
  <div class="banner_wrapper">
    <div class="share-logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'template_url' )?>/images/share.png" alt="share logo" /></a></div>
  </div>
</div>
<div id="wrapper-top">
  <div id="top-container">
    <div id="top-right">
      <div id="top-navigation"><?php wp_nav_menu( array( 'menu' => 'navigation','menu_id' =>'topnav') );  ?>
      </div>
      <!-- end top-navigation -->      
    </div>
    <!-- end top-right -->    
  </div>
  <!-- end top-container -->  
</div>
