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

  <div class="water-color-logo">
    <img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" />
  </div>

  <div class="social__icons">
    <i class="fa fa-pinterest" aria-hidden="true"></i>
    <i class="fa fa-instagram" aria-hidden="true"></i>
    <i class="fa fa-facebook-square" aria-hidden="true"></i>
  </div>


  <div class="site__info">

  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
