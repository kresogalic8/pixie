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
				<?php while (have_posts()) : the_post(); ?>

					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<div class="post-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="post-title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					</div>

					<div id="author-info">

						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?>
						</div>


						<div id="author-description">
							<h3><?php the_author_link(); ?></h3>
							<p><?php the_author_meta('description'); ?></p>
							<span class="author-posts">See all posts by  <?php the_author_posts_link(); ?></span>
					   </div>
					</div>


				<?php 
				
				// If comments are open or we have at least one comment, load up the comment template.
			    if ( comments_open() || get_comments_number() ) {
				    comments_template();
			    } ?>
			
				<?php endwhile; ?>

					<div class="navigation">
						<div class="next-posts"><?php next_posts_link(); ?></div>
						<div class="prev-posts"><?php previous_posts_link(); ?></div>
					</div>
			</div>
			<div class="sidebar">
				<!-- Blog sidebar -->
				<?php dynamic_sidebar( 'blog_sidebar' ); ?>
			</div>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>