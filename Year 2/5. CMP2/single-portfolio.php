<?php get_header();?>

<div class="main-container">
    <div class="main wrapper clearfix">



        <?php
        if(have_posts())
        {
            while(have_posts())
            {
                the_post();
                //echo '<article>';
                //Print the title and the content of the current post
                the_title('<h1>', '</h1>');
                the_content();
                the_date();
                echo ' ';
                the_author();

                //comment_form();
                //echo '</article>';
            }
        }
        else
        {
            echo 'No content available';
        }
        ?>
        <?php comments_template(); ?>

        <a href='<?php bloginfo('url'); ?>/forums/forum/<?php the_title(); ?>' class='forum_button'>Go to the Forum</a>

    </div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer();?>

