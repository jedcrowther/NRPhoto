<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<ul class="filtermenu">
	<li data-filter="all">all</li>
	<li data-filter="events">events</li>
	<li data-filter="weddings">weddings</li>
	<li data-filter="landscapes">landscapes</li>
</ul>


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

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="image__container">
              <a  href="<?php the_permalink(); ?>">
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
    
    
    <script>
      
jQuery( document ).ready( function( $ ) {  

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var FilterGallery = function () {
	function FilterGallery() {
		_classCallCheck(this, FilterGallery);

		this.$filtermenuList = $('.filtermenu li');
		// this.$container      = $('.container');
		this.$container = $('.gallery__container');
		this.updateMenu('all');
		this.$filtermenuList.on('click', $.proxy(this.onClickFilterMenu, this));
	}

	FilterGallery.prototype.onClickFilterMenu = function onClickFilterMenu(event) {
		var $target = $(event.target);
		var targetFilter = $target.data('filter');

		this.updateMenu(targetFilter);
		this.updateGallery(targetFilter);
	};

	FilterGallery.prototype.updateMenu = function updateMenu(targetFilter) {
		this.$filtermenuList.removeClass('active');
		this.$filtermenuList.each(function (index, element) {
			var targetData = $(element).data('filter');

			if (targetData === targetFilter) {
				$(element).addClass('active');
			}
		});
	};

	FilterGallery.prototype.updateGallery = function updateGallery(targetFilter) {
		var _this = this;

		if (targetFilter === 'all') {
			this.$container.fadeOut(300, function () {
                    $('.post').show();
				$('.image__container').show();
				_this.$container.fadeIn();
			});
		} else {
			 this.$container.find('.post').each((index, element)=>{
			// this.$container.find('.gallery__container').each(function (index, element) {
				_this.$container.fadeOut(300, function () {
					if ($(element).hasClass(targetFilter)) {
						$(element).show();
					} else {
						$(element).hide();
					}
					_this.$container.fadeIn();
				});
			});
		}
	};

	return FilterGallery;
}();

var fliterGallery = new FilterGallery();
      
  });
      </script>