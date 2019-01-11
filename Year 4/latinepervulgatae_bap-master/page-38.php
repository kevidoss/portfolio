<!-- Dit is de pagina voor oefenvragen -->
<?php get_header(); ?>

 <div class="wrapper-home">

   <!-- Start the Loop. -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


 <!-- Display the Post's content in a div box. -->


   <?php the_content(); ?>



 <!-- Stop The Loop (but note the "else:" - see next line). -->

<?php endwhile; else : ?>


 <p><?php echo 'Sorry, er zijn geen oefenvragen.'; ?></p>


 <!-- REALLY stop The Loop. -->
<?php endif; ?>


 </div>


<?php get_footer(); ?>
