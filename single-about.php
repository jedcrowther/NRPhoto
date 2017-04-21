<?php
$args = array(
    'post_type' => 'About',
    'post_status' => 'publish',
    'numberposts' => 1
);

$about = new WP_Query($args);
get_header();
?>

<section class="about__section">
  <?php
  $about_image = rwmb_meta('about-image');
if (!empty($about_image)) {
    foreach ($about_image as $about_img) {
      ?>
      <div class="about__image about__page" style="background-image: url('<?php echo $about_img['full_url'] ?>')">
    <?php }
  } ?>

</div>
<?php if ($about->have_posts()) : ?>

  <?php
  while ($about->have_posts()) :
    $about->the_post();
    ?>
    <div class="about__text"> 
      <h2><?php echo rwmb_meta('about-title'); ?></h2>
      <p><?php echo get_the_content() ?></p>
    </div>
    <?php
  endwhile;
  wp_reset_postdata();
  ?>
<?php endif; ?>
</section>


<?php
  $gear_image = rwmb_meta('gear-image');
if (!empty($gear_image)) {
    foreach ($gear_image as $gear_img) {
      ?>
      <div class="flatlay__section" style="background-image: url('<?php echo $gear_img['full_url'] ?>')">
    <?php }
  } ?>

      </div>
<div class="gear__list"> 
  <h2><?php echo rwmb_meta('gear-title'); ?></h2>
<?php echo rwmb_meta('gear-list'); ?> 
</div>


  <?php edit_post_link(); ?>

<?php
get_sidebar();
get_footer();
