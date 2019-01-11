<!--Dit is het overzicht van Media -->
<?php get_header(); ?>

 <div class="wrapper-media">
   <?php
   $query_images_args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => - 1,
);

$query_images = new WP_Query( $query_images_args );

$images = array();
foreach ( $query_images->posts as $image ) {
    $images[] = wp_get_attachment_url( $image->ID );
}

if ($images) {
    echo '<div class="row"><h3>Afbeeldingen</h3>';
      foreach ($images as $images) {
        echo '<img src="'.$images.'" class="column expandimg" data-featherlight="'.$images.'">';
      }
    echo "</div>";
};
?>
</div>
<div class="wrapper-media" id="videoblock">
<div class="row">
  <h3>Video's</h3>

  <?php query_posts('category_name=video'); ?>


  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="video"><?php echo the_content(); ?></div>

  <?php endwhile; endif; ?>
    </div>
</div>
  </div>



<?php get_footer(); ?>
