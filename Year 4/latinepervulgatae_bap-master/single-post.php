<?php
/*
 * Template Name: Latine post
 * Template Post Type: post
 */

 get_header();  ?>
 

 <div class="wrapper wrapper-normal">
   <div class="leftbg" id="leftbg">
     <?php
       $post_id = $GLOBALS['post_id'];
       $queried_post = get_post($post_id);
       $title = $queried_post->post_title;
       $content = $queried_post->post_content;
       $content = apply_filters('the_content', $content);
       $content = str_replace(']]>', ']]&gt;', $content);
     ?>
     <h3><?php echo $title; ?></h3>
     <p><?php echo $content; ?></p>
   </div>

   <div class="rightbg" id="rightbg">
  <?php
     $post_id_two = get_post_meta($queried_post->ID, 'prefix_translation_post', true);
     $queried_post_two = get_post($post_id_two);
     $title_two = $queried_post_two->post_title;
     $content_two = $queried_post_two->post_content;
     $content_two = apply_filters('the_content', $content_two);
     $content_two = str_replace(']]>', ']]&gt;', $content_two);
  ?>
  <h3><?php echo $title_two; ?></h3>
  <p><?php echo $content_two; ?></p>
   </div>
   <section class="linksdetail">
     <div class="goback"><a href="<?php echo get_page_link(34); ?>">Overzicht woordenschat</a></div>
     <div class="goback"><a href="<?php echo get_page_link(36); ?>">Overzicht cultuur</a></div>
     <div class="goback"><a href="<?php echo get_page_link(29); ?>">Overzicht teksten</a></div>
   </section>

  </div>



<?php get_footer(); ?>
