<?php
//adding the meta box when the admin panel initialises
add_action("admin_init", "add_meta_boxes");
// this adds the save meta box function on save post
add_action('save_post', 'save_meta_box');

function add_meta_boxes() {

  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
// checks for post/page ID
  if ($post_id == '304') {
    add_meta_box('about_info', 'About Info', 'about_meta', 'page', 'normal', 'default');
    add_meta_box('gear_head', 'Gear Heading', 'gear_meta', 'page', 'normal', 'default');
  }
}

// back function of add meta box that displays the meta box in the post edit screen
function about_meta($post, $args) {
  $about_head = get_post_meta($post->ID, 'about_head', true);
  $about_bio = get_post_meta($post->ID, 'about_bio', true);
  ?>
  <label>About Header: </label><input class="widefat" type="text" name="about_head" value="<?php echo $about_head; ?>" /><br/><br>
  <label>About Bio: </label><textarea class="widefat" style="height:200px;"  name="about_bio"><?php echo $about_bio; ?></textarea> <br/>
  <?php
}

function gear_meta($post, $args) {
  $gear_head = get_post_meta($post->ID, 'gear_head', true);
  ?>
  <label>Gear Header: </label><input class="widefat" type="text" name="gear_head" value="<?php echo $gear_head; ?>" /><br/>
  <?php
}

// saves the meta boxes
function save_meta_box() {
  global $post;
  update_post_meta($post->ID, 'about_head', $_POST['about_head']);
  update_post_meta($post->ID, 'about_bio', $_POST['about_bio']);
  update_post_meta($post->ID, 'gear_head', $_POST['gear_head']);
}
