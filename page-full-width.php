<?php
/**
 + Template name: Page - Full width
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
			<div class="content full-width">
				<!-- Basic loop -->
				<?php while (have_posts()) : the_post(); ?>

					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php the_content(); 
						
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pixie' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pixie' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );?>
					</div>

				<?php 
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				
				endwhile; ?>
			</div>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>