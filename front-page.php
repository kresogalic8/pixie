<?php
/**
 * The front page template.
 *
 * @package pixie
 */
?>

<?php get_header(); ?>

	<!--===========================
	=            Intro            =
	============================-->
	
	<div class="intro">
		<div class="intro-wrapper">
			<div class="container">
				<div class="intro-body">
					<h1><?php _e( 'Pixie - Wordress Starter Theme', 'pixie' ); ?></h1>
					<p><?php _e( 'Pixie is a WordPress Starter Theme for creating nice new themes, speed up your wordpress development and to not repeat yourself every time when you are starting new project.', 'pixie' ); ?></p>
					<a href="" class="button"><?php _e( 'Get started', 'pixie' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	
	<!--====  End of Intro  ====-->


	<!--=============================
	=            Content            =
	==============================-->
	
	<div class="wrapper">
		<div class="content-wrapper container">
			<!-- Basic loop -->
			<?php if (have_posts()) : 
			
			while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
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
					<h1><?php _e( 'Not Found', 'pixie' ); ?></h1>
				</div>

			<?php endif; ?>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>