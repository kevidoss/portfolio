<?php
/*
 * Template Name: Latine cultuur
 * Template Post Type: post
 */

 get_header();  ?>


 <div class="wrapper wrapper-cultuur">
   <div id="cultuur">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


 	<h2><?php the_title(); ?></h2>

 		<?php the_content(); ?>


 <?php endwhile; ?>


 <?php endif; ?>
</div>
<section class="linksdetail">
  <div class="goback"><a href="<?php echo get_page_link(34); ?>">Overzicht woordenschat</a></div>
  <div class="goback"><a href="<?php echo get_page_link(36); ?>">Overzicht cultuur</a></div>
  <div class="goback"><a href="<?php echo get_page_link(29); ?>">Overzicht teksten</a></div>
</section>

  </div>



<?php get_footer(); ?>
