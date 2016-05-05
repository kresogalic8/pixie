<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="main">

	<!--============================
	=            Header            =
	=============================-->
	
	<div class="header">
		<div class="container">
			<!-- Logo -->
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h3><?php bloginfo( 'name' ); ?></h3></a>
			</div>

			<?php if(has_nav_menu('main_menu')) { ?>
			<!-- Hamburger icon -->
			<button id="mobile-trigger" class="hamburger-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- Main menu -->
			
			<?php $defaults = array(
			  'theme_location'  => 'main_menu',
			  'menu'            => '', 
			  'container'       => false, 
			  'echo'            => true,
			  'fallback_cb'     => false,
			  'items_wrap'      => '<ul id="%1$s"> %3$s</ul>',
			  'depth'           => 0 );
			  wp_nav_menu( $defaults );
			?>
			<?php } else { ?>
				<span class="no-menu"><?php echo esc_html__( 'Assign menu here.', 'pixie' ); ?></span>
			<?php } ?>

			<!-- Search icon -->
			<button class="search-icon"></button>

			<div class="search-wrapper">
				<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" placeholder="Type something to search" value="<?php the_search_query(); ?>" name="s" id="s" required />
					<input type="submit" id="searchsubmit" value="GO" />
					<a href="#" class="close-icon"><img width="30px" height="30px" src="<?php echo get_stylesheet_directory_uri(); ?>/img/close.svg" alt=""></a>
				</form>
			</div>
			
			
		</div>
	</div>
	
	<!--====  End of Header  ====-->
	
	