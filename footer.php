<?php
get_sidebar();
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

  <?php if (get_theme_mod('nrphoto_footer_logo')) : ?>
    <div class="water-color-logo">
      <a href='<?php echo esc_url(home_url('/')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'>
        <img src='<?php echo esc_url(get_theme_mod('nrphoto_footer_logo')); ?>' alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'>
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
