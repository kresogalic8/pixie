<?php
/**
 * The page template for display content.
 *
 * @package pixie
 */
?>

<?php get_header(); ?>
	
	<!--=============================
	=            Content            =
	==============================-->
	
	<div class="wrapper">
		<div class="title">
			<h3><?php echo the_title(); ?></h3>
		</div>

		<div class="content-wrapper container">
			<!-- Basic loop -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<?php the_content(); ?>
				</div>

			<?php endwhile; ?>

				<div class="navigation">
					<div class="next-posts"><?php next_posts_link(); ?></div>
					<div class="prev-posts"><?php previous_posts_link(); ?></div>
				</div>

			<?php else : ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<h1>Not Found</h1>
				</div>

			<?php endif; ?>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>