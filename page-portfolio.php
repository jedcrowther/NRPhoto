<?php

get_header();
?>

<section class="home__galleries">
  
      <?php
      
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

            <div class="reveal image__container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image__thumb')); ?>
                <div class="image__thumb--overlay">
                  <div class="image__thumb--text"><?php the_title(); ?></div>
                  <div class="image__thumb--icon"><?php
                        
                  $hover = get_post_meta($post->ID, '_nrphoto_attached_image', true);
                  echo wp_get_attachment_image($hover);
                  
                   ?>
                  </div>
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
get_footer();
