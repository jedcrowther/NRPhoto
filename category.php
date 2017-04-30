<?php
/**
* A Simple Category Template
*/

get_header(); ?>

<section class="portfolio__galleries">
  <div class="gallery__container">

<?php if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

            <div class="image__container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image__thumb')); ?>
                <div class="image__thumb--overlay">
                  <div class="image__thumb--text"><?php the_title(); ?></div>
                </div>
              </a>
            </div>
  
<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
</div>
</section>

<?php


get_footer(); 