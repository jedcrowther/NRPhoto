<?php
/**

 */
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <section class="galleries">
      <?php
      wp_nav_menu(array('theme_location' => 'gallery-menu', 'container_class' => 'gallery_menu_class'));

      $latest_posts = get_posts(array(
          'numberposts' => 6
      ));
      ?>

      <div class="gallery-container"> 

        <?php
        if ($latest_posts) {
          foreach ($latest_posts as $post) {
            setup_postdata($post);
            ?>

            
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'gallery-thumb')); ?> 
                <div class="post-overlay">
                  <div class="content">
                    <p> <?php the_title(); ?></p>
                    <p><?php the_category(); ?></p>
                  </div>
                </div>
              </a>

            <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
    </section> 

    <section class="stars">
      <p class="stars-quote-mark">“</p><h3 class="stars-quote">Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at. Vestibulum nec erat ut mi sollicitudin porttitor id sit amet risus.</h3>
    </section>
    <section class="about">
      <div class="about-image"></div>
      <div class="about-text">
        <h2>About Natalie</h2>
        <p>Curabitur lobortis id lorem id bibendum. Ut id consectetur magna. Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at. Vestibulum nec erat ut mi sollicitudin porttitor id sit amet risus. Nam tempus vel odio vitae aliquam. In imperdiet eros id lacus vestibulum vestibulum.</p>
        <a>Read More</a>
      </div>
    </section>
    <section class="contact">
      <div class="contact-container">
        <h2>Contact</h2>
        <p>+64 027 1234567</p>
        <p>natalierosephoto@gmail.com</p>
      </div>
    </section> 


  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
