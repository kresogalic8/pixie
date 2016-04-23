<?php 

// Load all styles and scripts
function pixie_styles_and_scripts()  
{ 

	// Main css
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	// Main js
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.min.js' );

}
add_action('wp_enqueue_scripts', 'pixie_styles_and_scripts');

// enable post thumbails
add_theme_support( 'post-thumbnails' );

// enable menu support
add_theme_support( 'menus' );

// register new menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main_menu' => __( 'Main Menu', 'seedo' ),
		  'footer_menu' => __( 'Footer Menu', 'seedo' ),
		)
	);
}

// register sidebar widgets
function sidebars() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'wpb' ),
		'id' => 'main_sidebar',
		'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5><div class="separator-holder sidebar-title-separator separator-left"><div class="separator"></div></div>',
	) );

	register_sidebar( array(
		'name' =>__( 'Blog sidebar', 'wpb'),
		'id' => 'blog_sidebar',
		'description' => __( 'Appears on the blog page template', 'wpb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5><div class="separator-holder sidebar-title-separator separator-left"><div class="separator"></div></div>',
	) );
	}

add_action( 'widgets_init', 'sidebars' );

 ?>