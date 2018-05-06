<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo('description') ?>">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<!-- Master Css -->
<link href="<?php bloginfo('template_url'); ?>/css/master.css" rel="stylesheet">
<!-- Main Css -->
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<!-- Container -->
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
<?php
           wp_nav_menu( array(
               'menu'              => 'secondary',
               'theme_location'    => 'secondary',
               'depth'             => 1,
               'container'         => '',
               'container_class'   => '',
			   'container_id'      => '',
               'menu_class'        => 'top_nav',
               'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
               'walker'            => new wp_bootstrap_navwalker())
           );
       ?>
          </div>
          <!-- Buscador /Search -->
          <div class="header_top_right">
            <form class="search_form" action="<?php bloginfo('url') ?>">
              <input type="text" value name="s" id="s" placeholder="Text to Search">
              <input type="submit" id="searchsubmit" value="">
            </form>
          </div>
          <!-- /Buscador /Search -->
        </div>
        <!-- Logo and Description - Logo y Descripcion -->
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="<?php bloginfo('url'); ?>"><strong><?php bloginfo('name'); ?></strong><span><?php bloginfo('description'); ?></span></a></div>
          <div class="header_bottom_right">
          <a href="#" style="padding-top:25px;text-align:center;background-image:url(http://www.solidbackgrounds.com/images/2560x1440/2560x1440-trolley-grey-solid-color-background.jpg); width:100%; height:128px;display:block; color:white;"><h1>You can place an ad here</h1></a>
          </div>
        </div>
        <!-- /Logo and Description - Logo y Descripcion -->
      </div>
    </div>
  </header>
<!-- Navbar/ Menu -->
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
<?php
           wp_nav_menu( array(
               'menu'              => 'primary',
               'theme_location'    => 'primary',
               'depth'             => 2,
               'container'         => '',
               'container_class'   => '',
			   'container_id'      => '',
               'menu_class'        => 'nav navbar-nav',
               'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
               'walker'            => new wp_bootstrap_navwalker())
           );
       ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>