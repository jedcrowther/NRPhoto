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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://use.fontawesome.com/176a9d574f.js"></script>
<script src="js/script.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'wp_underscore'); ?></a>
    
    
   
    
    <div class="hero">
    <?php if (get_header_image()) : ?>
      <header id="masthead" class="site-header" style="background-image: url(<?php header_image() ?>)" role="banner">
     <?php endif; ?>
          
		<div id="ParallaxContent" class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; 
                        
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        ?>
                        <img class="nrphoto-logo-white" src="<?php echo $image[0];?>" alt="Natalie Rose Photography Logo">
                        
                       
		</div><!-- .site-branding -->

		
	</header><!-- #masthead -->
    </div>
 <nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp_underscore' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	<div id="content" class="site-content">
<!--<script>var parallaxImage = document.getElementById('masthead');
var parallaxContent = document.getElementById('ParallaxContent');
var windowScrolled;

window.addEventListener('scroll', function windowScroll() {
  windowScrolled = window.pageYOffset || document.documentElement.scrollTop;
  parallaxImage.style.transform = 'translate3d(0, ' + windowScrolled / 4 + 'px, 0)';
  parallaxContent.style.transform = 'translate3d(0, ' + windowScrolled / 6 + 'px, 0)';
});</script>-->