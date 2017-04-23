<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_underscore
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

  <?php if ( get_theme_mod( 'tcx_footer_logo' ) ) : ?>
  <div class="water-color-logo">
     <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
          <img src='<?php echo esc_url( get_theme_mod( 'tcx_footer_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
     </a>
 
  </div>
  <?php endif; ?>
 
  <?php my_social_icons_output(); ?>

  
 
  <div class="site__info">

  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
