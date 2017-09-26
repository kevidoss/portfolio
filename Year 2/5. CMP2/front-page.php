<?php get_header(); ?>
    <div class="main-container">
        <div class="main wrapper clearfix">
            <?php wowslider(3); ?>

            <?php get_sidebar(); ?>

                    <article>
                        <?php

                        if(have_posts())
                        {
                            while(have_posts())
                            {
                                the_post();?>

                                <a href="<?php the_permalink();?>" title="<?php the_title()?>">
                                    <h1>
                                        <?php the_title();?>
                                    </h1>
                                </a>
                                <?php the_content('<p>', '</p>');?>

                                <?php
                            }
                        }
                        else
                        {
                            echo 'No content available';
                        }
                        ?>
                        <?php
                        // Example argument that defines three posts per page.
                        $args = array( 'posts_per_page' => 3 );

                        // Variable to call WP_Query.
                        $the_query = new WP_Query( $args );

                        if ( $the_query->have_posts() ) :
// Start the Loop
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                ?>
                                <a href="<?php the_permalink();?>" title="<?php the_title()?>">
                                    <h1>
                                        <?php the_title();?>
                                    </h1>
                                </a>
                                <?php
//the_excerpt();
                                the_content('<p>', '</p>');

// End the Loop
                            endwhile;
                        else:
// If no posts match this query, output this text.
                            _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
                        endif;
                        wp_reset_postdata();

                        ?>

                    </article>
                </div>
            </div>


        </div> <!-- #main -->
    </div> <!-- #main-container -->


<?php get_footer(); ?>