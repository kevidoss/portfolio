<?php get_header(); ?>

<div class="main-container">
    <div class="main wrapper clearfix">


        <?php
        if(have_posts()): ?>

            <?php while(have_posts())
            {
                the_post();
                //Print the title and the content of the current post
                echo '<article>';
                the_title('<h1>', '</h1>');
                the_content();
                echo '<small>';
                the_author();
                echo '</br>';
                the_date();
                echo '</small>';
                echo '</article>';
            }
            ?>
        <?php else: ?>

            echo 'No content available';
        <?php endif; ?>

    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>