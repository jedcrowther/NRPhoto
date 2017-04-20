<?php
$args = array(
  'post_type'   => 'About',
  'post_status' => 'publish',
  'numberposts' => 1
 );
 
$about = new WP_Query( $args );
get_header();
?>

<section class="about__section">
  <div class="about__image about__page"></div>
<?php if( $about->have_posts() ) :?>
  
    <?php
      while( $about->have_posts() ) :
        $about->the_post();
        ?>
    <div class="about__text"> 
          <h2><?php echo get_the_title();  ?></h2>
          <p><?php echo get_the_content()  ?></p>
    </div>
        <?php
      endwhile;
      wp_reset_postdata();
    ?>
<?php endif; ?>
</section>


<div class="flatlay__section">
</div>
<div class="gear__list"> 
  <h2>What's In My Bag</h2>
    
</div>
<?php edit_post_link(); ?>

<?php
get_sidebar();
get_footer();
