<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<div class="wrapper">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<div class="title">
				<h3><?php woocommerce_page_title(); ?></h3>
			</div>	
			
		<?php endif; ?>
		
			<?php
				/**
				* woocommerce_before_main_content hook.
				*
				* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				* @hooked woocommerce_breadcrumb - 20
				*/
				do_action( 'woocommerce_before_main_content' );
			?>

			<div class="content">	

				<?php
					/**
					* woocommerce_archive_description hook.
					*
					* @hooked woocommerce_taxonomy_archive_description - 10
					* @hooked woocommerce_product_archive_description - 10
					*/
					do_action( 'woocommerce_archive_description' );
				?>

				<?php if ( have_posts() ) : ?>

					<?php
						/**
						* woocommerce_before_shop_loop hook.
						*
						* @hooked woocommerce_result_count - 20
						* @hooked woocommerce_catalog_ordering - 30
						*/
						do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
						/**
						* woocommerce_after_shop_loop hook.
						*
						* @hooked woocommerce_pagination - 10
						*/
						do_action( 'woocommerce_after_shop_loop' );
					?>	

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
				
			<?php
				/**
				* woocommerce_after_main_content hook.
				*
				* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				*/
				do_action( 'woocommerce_after_main_content' );
			?>
			
			<div class="sidebar">
				<?php
					/**
					* woocommerce_sidebar hook.
					*
					* @hooked woocommerce_get_sidebar - 10
					*/
					do_action( 'woocommerce_sidebar' );
				?>
			</div>
	
		</div>
	</div>

<?php get_footer( 'shop' ); ?>
