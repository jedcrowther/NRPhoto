<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_underscore
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="site menu">
      <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'wp_underscore'); ?></a>

      <?php
      $custom_logo_id = get_theme_mod('custom_logo');
      $image = wp_get_attachment_image_src($custom_logo_id, 'full');
      ?>

      <?php if (is_home()) { ?>
        <div class="hero home__hero">
          <?php if (get_custom_header()) : ?>
            <header id="masthead" class="site__header" style="background-image: url(<?php header_image() ?>)" role="banner">
            <?php endif; ?>
            <div id="ParallaxContent" class="site__branding">

              <a href="<?php echo get_home_url(); ?>"><img class="nrphoto__logo--white home" src="<?php echo $image[0]; ?>" alt="Natalie Rose Photography Logo"></a>
            </div><!-- .site__branding -->		
          </header><!-- #masthead -->

        <?php } else { ?>
          <div class="hero other__hero">
            <?php if (get_header_image()) : ?>
              <header id="masthead" class="site__header" style="background-image: url(<?php header_image() ?>)" role="banner">
                <div id="ParallaxContent" class="site__branding">
                  <a href="<?php echo get_home_url(); ?>"><img class="nrphoto__logo--white other" src="<?php echo $image[0]; ?>" alt="Natalie Rose Photography Logo"></a>
                </div>
              <?php endif; ?>
            <?php } ?>
        </div>

        <div class="shadow"></div>      
        <svg class="menu__icon menu-toggle" aria-controls="primary-menu" aria-expanded="false" xmlns="http://www.w3.org/2000/svg" width="30" height="16">
          <path class="icon-top" fill="none" stroke="#999" stroke-width="2" d="M0 1h30" stroke-linecap="butt"/>
          <path class="icon-middle" fill="none" stroke="#999" stroke-width="2" d="M0 8h30" stroke-linecap="butt"/>
          <path class="icon-bottom" fill="none" stroke="#999" stroke-width="2" d="M0 15h30" stroke-linecap="butt"/>
        </svg>
        
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
        </nav>
      </div>
      <!-- #site-navigation -->
      <div id="content" class="site-content">

