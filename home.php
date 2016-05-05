<?php
/**
 * The index template.
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
			<h3><?php _e('Blog posts', 'pixie'); ?></h3>
		</div>
		
		<div class="content-wrapper container">
			<div class="content">
				<!-- Basic loop -->
				<div class="posts">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<div class="post__image">
								<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('blog-image'); ?></a>
							</div>
							<h1 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<div class="post__excerpt"><?php the_excerpt(); ?></div>
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
			<div class="sidebar">
				<!-- Main sidebar -->
				<?php if(is_active_sidebar( 'blog_sidebar')) {  ?>
					<?php dynamic_sidebar( 'blog_sidebar' ); ?>
				<?php } else { ?>
					<span><?php _e('Assign sidebar here.', 'pixie') ?></span>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>