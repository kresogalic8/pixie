<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package pixie
 */

get_header(); ?>

	<!--=============================
	=            Content            =
	==============================-->
	
	<div class="wrapper">
		<div class="title">
			<h3><?php _e( 'Oops! That page can&rsquo;t be found.', 'pixie' ); ?></h3>
		</div>

		<div class="content-wrapper container">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'pixie' ); ?></p>

			<?php get_search_form(); ?>
		</div>
	</div>
	
	<!--====  End of Content  ====-->

<?php get_footer(); ?>