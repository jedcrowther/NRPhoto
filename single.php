<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_underscore
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                  
                  
                     <div class="image__thumb--icon"><?php
                  $img = rwmb_meta('hover-image', 'type=plupload_image&size=round-feature-image');
                  foreach ($img as $image) {
                    echo "<img src='" . "{$image['url']}" . "' alt='" . "{$image['title']}" . "'>";
                  }
                  ?></div>

                  

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );	

		endwhile; // End of the loop.
		?>
                 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
