<!-- Dit is de pagina van woordenschat -->
<?php get_header(); ?>
<script>
jQuery(document).ready(function(){
  jQuery("#myInput").on("keyup", function() {
    var value = jQuery(this).val().toLowerCase();
    jQuery("#myContent div").filter(function() {
      jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



 <div class="wrapper overzichtteksten" id="myContent">

    <section class="paginatitel">
      <h3>Overzicht woordenschat</h3>
      <input id="myInput" class="search" placeholder="Zoeken" />
    </section>


  <?php query_posts('category_name=woordenschat'); ?>


  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="tekstBlok">
    <li>
      <h3><?php the_title(); ?></h3>
      <p><?php the_excerpt(); ?></p>
      <a class="postLink" onclick="myAjax()" href="<?php echo get_permalink(); ?>" >Lees meer...</a>
    </li>
  </div>

  <?php endwhile; endif; ?>


</div>



<?php get_footer(); ?>
