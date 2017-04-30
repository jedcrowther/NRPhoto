<?php
$args = array(
    'page_id' => '259'
);

$contact = new WP_Query($args);

$contact_meta = get_post_meta(259);

get_header();
?>

<div class="contact__page">
  <?php if ($contact->have_posts()) : ?>
    <?php
    while ($contact->have_posts()) :
      $contact->the_post();
      ?>
      <h3 class="contact__title"><?php echo $contact_meta['contact_head'][0] ?></h3>
      <div class="contact__blurb"><?php echo get_the_content() ?></div>
      <p><?php echo $contact_meta['contact_email'][0] ?></p>
      <p><?php echo $contact_meta['contact_number'][0]; ?></p>
      <?php
    endwhile;
    wp_reset_postdata();
    ?>
  <?php endif; ?>
</div>

<?php edit_post_link(); ?>

<div id="yourfooterwidgetid">
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Widget')) : ?>
  <?php endif; ?>
</div>

<?php
get_footer();

