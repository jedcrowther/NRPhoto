<?php
/**

 */
get_header();
?>

<div class="portfolio-carousel"></div>

<div class="portfolio__link">
  <h2></h2>
</div>

<section class="home__galleries">
      <?php
      wp_nav_menu(array('theme_location' => 'gallery-menu', 'container_class' => 'gallery_menu_class'));
      $latest_posts = get_posts(array(
          'numberposts' => 6
      ));
      ?>
      <div class="gallery__container">
        <?php
        if ($latest_posts) {
          foreach ($latest_posts as $post) {
            setup_postdata($post);
            ?>
        
            <div class="image__container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image__thumb')); ?>
                <div class="image__thumb--overlay">
                  <div class="image__thumb--text"><?php the_title(); ?></div>
                  <div class="image__thumb--icon"><?php
                  $img = rwmb_meta('hover-image', 'type=plupload_image&size=round-feature-image');
                  foreach ($img as $image) {
                    echo "<img src='" . "{$image['url']}" . "' alt='" . "{$image['title']}" . "'>";
                  }
                  ?></div>
                </div>
              </a>
                  
            </div>
            <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
    </section>


<?php
get_sidebar();
get_footer();
