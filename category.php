<?php
/**
* A Simple Category Template
*/

get_header(); ?>

<section class="galleries">
  <div class="container">

<?php if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

  
  

      
       


            <div class="image-container">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'image')); ?>
                <div class="overlay">
                  <div class="text"><?php the_title(); ?></div>
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

get_sidebar(); 
get_footer(); 