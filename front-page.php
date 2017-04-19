<?php
/**

 */
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

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

    <section class="stars__section">
      <p class="stars__quote-mark">“</p><h3 class="stars__quote">Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at. Vestibulum nec erat ut mi sollicitudin porttitor id sit amet risus.</h3>
    </section>
    
    
    <section class="about__section">
      <div class="about__image"></div>
      <div class="about__text">
        <h2>About Natalie</h2>
        <p>Curabitur lobortis id lorem id bibendum. Ut id consectetur magna. Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at. Vestibulum nec erat ut mi sollicitudin porttitor id sit amet risus. Nam tempus vel odio vitae aliquam. In imperdiet eros id lacus vestibulum vestibulum.</p>
        <a href="about">Read More</a>
      </div>
    </section>
    
    
    <section class="contact__section">
      <div class="contact__container">
        <h2>Contact</h2>
        <p>+64 027 1234567</p>
        <p class="contact-email">natalierosephoto@gmail.com</p>
      </div>
    </section> 


  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
