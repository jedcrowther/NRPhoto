<?php


//adding the meta box when the admin panel initialises
add_action('admin_init', 'add_contact_boxes');
// this adds the save meta box function on save post
add_action('save_post', 'save_contact_box');


function add_contact_boxes() {
  
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
// checks for post/page ID
if ($post_id == '259')
{
  add_meta_box('contact_info', 'Contact Info', 'contact_meta', 'page', 'normal', 'default');
}
}
// back function of add meta box that displays the meta box in the post edit screen
function contact_meta($post, $args) {
  $contact_head = get_post_meta($post->ID, 'contact_head', true);
  $contact_email = get_post_meta($post->ID, 'contact_email', true);
  $contact_number = get_post_meta($post->ID, 'contact_number', true);

  ?>
<label>Heading: </label><input class="widefat" type="text" name="contact_head" value="<?php echo $contact_head; ?>" /><br><br>
<label>Email: </label><input class="widefat" type="email" name="contact_email" value="<?php echo $contact_email; ?>" /><br><br>
<label>Phone Number: </label><input class="widefat" type="number" name="contact_number" value="<?php echo $contact_number; ?>"/><br>
  <?php
}



// saves the meta boxes
function save_contact_box() {
  global $post;
  update_post_meta($post->ID, 'contact_head', $_POST['contact_head']);
  update_post_meta($post->ID, 'contact_email', $_POST['contact_email']);
  update_post_meta($post->ID, 'contact_number', $_POST['contact_number']);
}
