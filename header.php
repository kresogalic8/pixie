<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body>

<div class="main">

	<!--============================
	=            Header            =
	=============================-->
	
	<div class="header">
		<div class="container">
			<!-- Logo -->
			<div class="logo">
				<a href="<?php echo home_url(); ?>"><h3>Pixie</h3></a>
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
				<span class="no-menu">Assign menu here.</span>
			<?php } ?>
		</div>
	</div>
	
	<!--====  End of Header  ====-->
	
	