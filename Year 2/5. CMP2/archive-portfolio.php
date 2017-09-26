<?php get_header(); ?>
	<div class="main-container">


		<div class="main wrapper clearfix">
			<article>
			<h1>Taxonomy Portfolio</h1>
			<?php if (have_posts()) : while (have_posts()) : the_post();
				the_title('<h1><a href="' . get_permalink() . '">', '</a></h1>');
				the_excerpt();
				echo '<a href="' . get_permalink() . '">Lees meer...</a>'; ?>
				<h4>Posted on <?php the_time('F jS, Y'); ?></h4>

			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</article>
			<?php get_sidebar(); ?>

		</div>

	</div>
	<div id="delimiter">
	</div>
<?php get_footer(); ?>