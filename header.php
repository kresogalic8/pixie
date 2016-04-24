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
		</div>
	</div>
	
	<!--====  End of Header  ====-->
	
	