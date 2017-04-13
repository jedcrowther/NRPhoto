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


<section class="galleries">

      <div class="container">
        <?php
        if ($event_posts) {
          foreach ($event_posts as $post) {
            setup_postdata($post);
            ?>


            <div class="image-container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image')); ?>
                <div class="overlay">
                  <div class="text"><?php the_title(); ?></div>
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


  
  <h3>Weddings</h3>
<section class="galleries">

      <div class="container">
        <?php
        if ($wedding_posts) {
          foreach ($wedding_posts as $post) {
            setup_postdata($post);
            ?>


            <div class="image-container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image')); ?>
                <div class="overlay">
                  <div class="text"><?php the_title(); ?></div>
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
  
  <h3>Landscapes</h3>
<section class="galleries">

      <div class="container">
        <?php
        if ($landscape_posts) {
          foreach ($landscape_posts as $post) {
            setup_postdata($post);
            ?>


            <div class="image-container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image')); ?>
                <div class="overlay">
                  <div class="text"><?php the_title(); ?></div>
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
    </div> 

<?php
get_sidebar();
get_footer();
