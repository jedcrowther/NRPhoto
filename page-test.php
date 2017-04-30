<?php

get_header();

?>
<!--<section class="home__galleries sets-gallery">
  
  <div class="filter gallery_menu_class">

	<a href="#all" class="current">All</a>
	<a href="#event">Events</a>
	<a href="#landscape">Landscapes</a>
	<a href="#wedding">Weddings</a>

</div>
  
  
	<div class="sets ">
		<a class="event "><img src="https://unsplash.it/450/300"></a>
		<a class=" landscape"><img src="https://unsplash.it/450/300"></a>
		<a class="wedding"><img src="https://unsplash.it/450/300"></a>
		<a class="event"><img src="https://unsplash.it/450/300"></a>
		<a class="landscape"><img src="https://unsplash.it/450/300"></a>
                <a class="wedding"> <img src="https://unsplash.it/450/300"></a>
	</div>
</section>-->

<section class="home__galleries">
  
    <div class="filter gallery_menu_class">
      
      <a href="#all" class="current">All</a>
	<a href="#events">Events</a>
	<a href="#landscapes">Landscapes</a>
	<a href="#weddings">Weddings</a>


</div>
      <?php
      
      $latest_posts = get_posts(array(
          'numberposts' => 30
      ));
      ?>
  

  
  <div class="gallery__container">
        <?php
        if ($latest_posts) {
          foreach ($latest_posts as $post) {
            setup_postdata($post);
            ?>

            <div class="image__container">
              <a  id="post-<?php the_ID(); ?>" <?php post_class(); ?> href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image__thumb')); ?>
                <div class="image__thumb--overlay">
                  <div class="image__thumb--text"><?php the_title(); ?></div>
                  <div class="image__thumb--icon"><?php
                        
                  $hover = get_post_meta($post->ID, '_nrphoto_attached_image', true);
                  foreach ($img as $image) {   
                  echo wp_get_attachment_image($image);
                  }
                  
                   ?>
                  </div>
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

<style>
  .filter a{
  padding: 10px 20px;
  display:inline-block;
  color: black;
  text-decoration:none;
  transition:all 0.2s;
}
.filter a:hover{
  opacity: 0.5;
}
.filter{
  padding:50px;
  text-align:center
}

.sets-gallery {
  height: 900px;
  border: 3px solid red;
}


.sets a img{
  width:100%;
  height:auto;
  float:left;
}
.sets a{
  width:33.33%;
  transition:all 0.2s;
  display:block;
  float:left;
  opacity:1;
  height:auto;
}

.image__container .hide, .image__container .pophide,
.sets .hide, .sets .pophide{
  width:0%;
  opacity:0;
  transition:all 0.1s;
}

.gallery__container .image__container  .pop,
.sets .pop{
  width:100%;
  position:relative;
  z-index:2;
  box-shadow:0 0 0px 1000px rgba(0,0,0,0.5);
}
.pop:after{
  content:" ";
  position:absolute;
  top:10px;
  right:10px;
  color:#333;
  background:#fff;
  padding:10px 15px;
  border-radius:50%;
  opacity:0.8;
}
.pop:hover:after{
  opacity:1
}


</style>

<script>
jQuery( document ).ready( function( $ ) {  
  $('.filter a').click(function(e) {
    e.preventDefault();
    var a = $(this).attr('href');
    a = a.substr(1);
//    $('.sets a').each(function() {
//      if (!$(this).hasClass(a) && a !== 'all')
//        $(this).addClass('hide');
//      else
//        $(this).removeClass('hide');
//    });
     $('.image__container a').each(function() {
      if (!$(this).hasClass(a) && a !== 'all')
        $(this).addClass('hide');
      else
        $(this).removeClass('hide');
    });

    
    

  });

//  $('.sets a').click(function(e) {
//    e.preventDefault();
//    var $i = $(this);
//    $('.sets a').not($i).toggleClass('pophide');
//    $i.toggleClass('pop');
//  });
  
  $('.image__container a ').click(function(e) {
    e.preventDefault();
    var $i = $(this);
    $('.image__container a ').not($i).toggleClass('pophide');
    $i.toggleClass('pop');
  });
});
</script>



<?php

get_footer();
