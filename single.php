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
						<?php the_post_thumbnail(); ?>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?>
					</div>

				<?php 
				
				// If comments are open or we have at least one comment, load up the comment template.
			    if ( comments_open() || get_comments_number() ) {
				    comments_template();
			    } ?>
				
				<footer class="entry-footer">
		            <?php pixie_entry_meta(); ?>
		                <?php
			                edit_post_link(
				            sprintf(
					            /* translators: %s: Name of current post */
					            __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'pixie' ),
					            get_the_title()
				            ),
				            '<span class="edit-link">',
				            '</span>'
			                );
		                ?>
	            </footer><!-- .entry-footer -->
			
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