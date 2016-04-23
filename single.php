<?php
/**
 * The single post template.
 *
 * @package pixie
 */
?>

<?php get_header(); ?>

	<!--=============================
	=            Content            =
	==============================-->
	
	<div class="wrapper">
		<div class="content-wrapper container">
			<div class="content">
				<!-- Basic loop -->
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php the_post_thumbnail(); ?>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
			<div class="sidebar">
				<!-- Blog sidebar -->
				<?php dynamic_sidebar( 'blog_sidebar' ); ?>
			</div>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>