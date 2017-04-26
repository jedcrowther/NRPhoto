<?php 
$args = array(
    'page_id' => '304'
);

$about = new WP_Query($args);

$about_meta = get_post_meta(304);


get_header();
?>

<section class="about__section">

 <?php var_dump( ); ?>
  
  
      <div class="about__image about__page" style="background-image: url('<?php echo esc_url( get_theme_mod( 'nrphoto_bio_image') ) ?>')">


</div>
  

    <div class="about__text"> 
      <h2><?php echo $about_meta['about_head'][0] ?></h2>
      <p><?php echo $about_meta['about_bio'][0] ?></p>
      
    </div>
   
</section>


      <div class="flatlay__section" style="background-image: url('<?php echo esc_url( get_theme_mod( 'nrphoto_bio_image') ) ?>')">
    

      </div>
<div class="gear__list"> 
  <?php if ($about->have_posts()) : ?>

  <?php
  while ($about->have_posts()) :
    $about->the_post();
    ?>
  <h2><?php echo $about_meta['gear_head'][0] ?></h2>
<p><?php echo get_the_content() ?></p>
  
   <?php
  endwhile;
  wp_reset_postdata();
  ?>
<?php endif; ?>
</div>


  <?php edit_post_link(); ?>

<?php
get_sidebar();
get_footer();
