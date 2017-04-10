<?php
get_header();
?>

<?php

$categories = get_categories(); ?>

<ul id="category-menu">
    <?php foreach ( $categories as $cat ) { ?>
    <li id="cat-<?php echo $cat->term_id; ?>"><a class="<?php echo $cat->slug; ?> ajax" onclick="cat_ajax_get('<?php echo $cat->term_id; ?>');" href="#"><?php echo $cat->name; ?></a></li>
    <?php } ?>
</ul>

<div id="loading-animation" style="display: none;"><img src="<?php echo admin_url ( 'images/loading-publish.gif' ); ?>"/></div>
<div id="category-post-content"></div>

<script>
function cat_ajax_get(catID) {
    jQuery("a.ajax").removeClass("current");
    jQuery("a.ajax").addClass("current"); //adds class current to the category menu item being displayed so you can style it with css
    jQuery("#loading-animation").show();
    var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); //must echo it ?>';
    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {"action": "load-filter", cat: catID },
        success: function(response) {
            jQuery("#category-post-content").html(response);
            jQuery("#loading-animation").hide();
            return false;
        }
    });
}
</script>


<?php
get_sidebar();
get_footer();
