<?php
/**

 */

$wedding_posts = get_posts(array(
          'category_name'  => 'Weddings'
      ));
$event_posts = get_posts(array(
          'category_name'  => 'Events'
      ));
$landscape_posts = get_posts(array(
          'category_name'  => 'Landscapes'
      ));

get_header();
?>

<h3>Events</h3>

<div class="galleries">
  <div class="gallery-container"> 

        <?php
        if ($event_posts) {
          foreach ($event_posts as $post) {
            setup_postdata($post);
            ?>

            <div class="post-container">
              <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail', array('class' => 'gallery-thumb')); ?> 

                <p> <?php the_title(); ?></p>
              </a>
            </div>

            <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
  
  <h3>Weddings</h3>
  <div class="gallery-container"> 
              <?php
        if ($wedding_posts) {
          foreach ($wedding_posts as $post) {
            setup_postdata($post);
            ?>

            <div class="post-container">
              <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail', array('class' => 'gallery-thumb')); ?> 

                <p> <?php the_title(); ?></p>
              </a>
            </div>

            <?php
          }
          wp_reset_postdata();
        }
        ?>
  </div>
  
  <h3>Landscapes</h3>
  <div class="gallery-container"> 
      <?php
        if ($landscape_posts) {
          foreach ($landscape_posts as $post) {
            setup_postdata($post);
            ?>

            <div class="post-container">
              <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail', array('class' => 'gallery-thumb')); ?> 

                <p> <?php the_title(); ?></p>
              </a>
            </div>

            <?php
          }
          wp_reset_postdata();
        }
        ?>
  </div>
    </div> 

<?php
get_sidebar();
get_footer();
