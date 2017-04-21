<?php
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

            <div class="reveal image__container">
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
      <div class="reveal quote-block">
        <div class="stars__quote-mark">“</div>
        <div class="stars__quote"> <?php echo get_bloginfo( 'description', 'display' ); ?>
        </div>
      </div>
    </section>


    <?php
    $args = array(
        'post_type' => 'About',
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $about = new WP_Query($args);
    $about_meta = get_post_meta(172);
    $about_image = $about_meta['about-image'][0];
    ?>

    <section class="reveal about__section">
      <div class="about__image" style="background-image: url('<?php echo wp_get_attachment_url($about_image); ?>')">
      </div>
      <?php if ($about->have_posts()) : ?>

        <?php
        while ($about->have_posts()) :
          $about->the_post();
          ?>
          <div class="about__text">
            <h2><?php echo $about_meta['about-title'][0] ?></h2>
            <p><?php echo get_the_content() ?></p>
            <a href="about">Read More</a>
            <?php
          endwhile;
          wp_reset_postdata();
          ?>
        <?php endif; ?>

    </section>


    <?php $contact_meta = get_post_meta(170);
    ?>

    <section class="contact__section">
      <div class="reveal contact__container">
        <h2>Contact</h2>
        <p><?php echo $contact_meta['phone'][0]; ?></p>
        <p class="contact-email"><?php echo $contact_meta['email'][0]; ?></p>
      </div>
    </section> 


  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
