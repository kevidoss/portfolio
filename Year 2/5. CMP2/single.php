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
                echo '</br>';
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






    </div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer();?>
