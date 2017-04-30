<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_underscore
 */
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">





    <div class="image__thumb--icon">

      <?php
      $hover = get_post_meta($post->ID, '_nrphoto_attached_image', true);
      echo wp_get_attachment_image($hover);
      ?>
    </div>

    <div>


    </div>

    <?php
    while (have_posts()) : the_post();

      get_template_part('template-parts/content', get_post_format());

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
