<?php 

function pixie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'actions_content_width', 780 );
}
add_action( 'after_setup_theme', 'pixie_content_width', 0 );

// featured image support
add_theme_support( 'post-thumbnails' );

// Custom image size
add_image_size( 'blog-image', 800, 300, true ); // Hard Crop Mode


function pixie_setup() {	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pixie' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	// enable post thumbails
    add_theme_support( 'post-thumbnails' );

    // enable menu support
    add_theme_support( 'menus' );

    // register new menus
	register_nav_menus(
		array(
		  'main_menu' => __( 'Main Menu', 'pixie' ),
		  'footer_menu' => __( 'Footer Menu', 'pixie' ),
		)
	);
}
add_action( 'after_setup_theme', 'pixie_setup' );

if ( ! function_exists( 'pixie_fonts_url' ) ) :
/**
 * Register Google fonts for Pixie.
 *
 * Create your own pixie_fonts_url() function to override in a child theme.
 *
 * @since Pixie 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function pixie_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'pixie' ) ) {
		$fonts[] = 'Poppins:400,300,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Open+Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open+Sans font: on or off', 'pixie' ) ) {
		$fonts[] = 'Open+Sans:400,300';
	}

	if ( $fonts ) {
		$fonts_url = esc_url( add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' ) );
	}

	return $fonts_url;
}
endif;

// Load all styles and scripts
function pixie_styles_and_scripts() { 
    // Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'pixie-fonts', pixie_fonts_url(), array(), null );
	// Main css
	wp_enqueue_style( 'pixie-main', get_template_directory_uri() . '/style.css' );
	// Main js
	wp_enqueue_script( 'pixie-script', get_template_directory_uri() . '/js/script.min.js' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action('wp_enqueue_scripts', 'pixie_styles_and_scripts');

// register sidebar widgets
function pixie_sidebars() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'pixie' ),
		'id' => 'main_sidebar',
		'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'pixie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5><div class="separator-holder sidebar-title-separator separator-left"><div class="separator"></div></div>',
	) );

	register_sidebar( array(
		'name' =>__( 'Blog sidebar', 'pixie'),
		'id' => 'blog_sidebar',
		'description' => __( 'Appears on the blog page template', 'pixie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5><div class="separator-holder sidebar-title-separator separator-left"><div class="separator"></div></div>',
	) );
	
	register_sidebar( array(
		'name' =>__( 'Footer left sidebar', 'pixie'),
		'id' => 'footer_left_sidebar',
		'description' => __( 'Footer sidebar', 'pixie' ),
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' =>__( 'Footer left middle sidebar', 'pixie'),
		'id' => 'footer_left_middle_sidebar',
		'description' => __( 'Footer sidebar', 'pixie' ),
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' =>__( 'Footer right middle sidebar', 'pixie'),
		'id' => 'footer_right_middle_sidebar',
		'description' => __( 'Footer sidebar', 'pixie' ),
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' =>__( 'Footer right sidebar', 'pixie'),
		'id' => 'footer_right_sidebar',
		'description' => __( 'Footer sidebar', 'pixie' ),
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' =>__( 'Shop sidebar', 'pixie'),
		'id' => 'shop_sidebar',
		'description' => __( 'Shop sidebar', 'pixie' ),
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}

add_action( 'widgets_init', 'pixie_sidebars' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


// Removing breadcrumbs - woocommerce
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Disable css - woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Display 9 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );

// Removing cross sells from cart view
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');