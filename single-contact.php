<?php
$args = array(
  'post_type'   => 'Contact',
  'post_status' => 'publish',
  'numberposts' => 1
 );
 
$contact = new WP_Query( $args );
get_header();
?>

<div class="contact__page">
  <?php if( $contact->have_posts() ) :?>
   <?php
      while( $contact->have_posts() ) :
        $contact->the_post();
        ?>
<h1 class="contact__title"><?php echo get_the_title();  ?></h1>
<div class="contact__blurb"><?php echo get_the_content()  ?></div>

<?php
      endwhile;
      wp_reset_postdata();
    ?>
<?php endif; ?>
</div>

<?php edit_post_link(); ?>

<div id="yourfooterwidgetid">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Widget') ) : ?>
<?php endif; ?>

</div>



<?php
get_sidebar();
get_footer();
