<?php

$args = array(
    'post_type' => 'Portfolio',
    'post_status' => 'publish',
    'numberposts' => 1
);

$portfolio = new WP_Query($args);

get_header();
?>

<?php if ($portfolio->have_posts()) : ?>

  <?php
  while ($portfolio->have_posts()) :
    $portfolio->the_post();
    ?>
    <div class="portfolio__text"> 
      <h2><?php echo get_the_title(); ?></h2>
      <p><?php echo get_the_content(); ?></p>
    </div>
    <?php
  endwhile;
  wp_reset_postdata();
  ?>
<?php endif; ?>
<?php edit_post_link(); ?>


<section class="home__galleries">
      <?php
      wp_nav_menu(array('theme_location' => 'gallery-menu', 'container_class' => 'gallery_menu_class'));
      $latest_posts = get_posts(array(
          'numberposts' => 30
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
