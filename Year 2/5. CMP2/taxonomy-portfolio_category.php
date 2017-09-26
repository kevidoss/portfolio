<?php get_header(); ?>
	<div class="main-container">
		<div class="main wrapper clearfix">

			<article>
			<h1>Taxonomy Portfolio</h1>
			<?php if (have_posts()) : while (have_posts()) : the_post();
				the_title('<h2><a href="' . get_permalink() . '">', '</a></h2>');

				$image = get_field('afbeelding');
				$link = get_field('link', $image['ID']);
				?>
				<a href="<?php echo $link; ?>">
					<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
				</a>
				<?php

				the_excerpt();
				echo '<a href="' . get_permalink() . '">Continue reading...</a>'; ?>
				<p>Posted on <?php the_time('F jS, Y'); ?></p>


			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</article>

		</div>

	</div>
	<div id="delimiter">
	</div>
<?php get_footer(); ?>

