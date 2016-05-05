	<!--============================
	=            Footer            =
	=============================-->
	
	<div class="footer">
		<div class="footer__widgets container">
			<div class="footer__column">
				<?php if(is_active_sidebar('footer_left_sidebar')) { ?>
					<?php dynamic_sidebar('footer_left_sidebar'); ?>
				<?php } else { ?>
					<span><?php _e('Assign sidebar here.', 'pixie') ?>
				<?php } ?>
			</div>
			<div class="footer__column">
				<?php if(is_active_sidebar('footer_left_middle_sidebar')) { ?>
					<?php dynamic_sidebar('footer_left_middle_sidebar'); ?>
				<?php } else { ?>
					<span><?php _e('Assign sidebar here.', 'pixie') ?>
				<?php } ?>
			</div>
			<div class="footer__column">
				<?php if(is_active_sidebar('footer_right_middle_sidebar')) { ?>
					<?php dynamic_sidebar('footer_right_middle_sidebar'); ?>
				<?php } else { ?>
					<span><?php _e('Assign sidebar here.', 'pixie') ?>
				<?php } ?>
			</div>
			<div class="footer__column">
				<?php if(is_active_sidebar('footer_right_sidebar')) { ?>
					<?php dynamic_sidebar('footer_right_sidebar'); ?>
				<?php } else { ?>
					<span><?php _e('Assign sidebar here.', 'pixie') ?>
				<?php } ?>
			</div>
		</div>
		<div class="footer__bottom">
			<div class="container">
				<!-- Copyright -->
				<div class="copyright">
					<span>Copyright &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo(); ?></span>
				</div>
				
				<!-- Footer menu -->
				<?php if(has_nav_menu('footer_menu')) { ?>
				<?php $defaults = array(
				'theme_location'  => 'footer_menu',
				'menu'            => '',
				'container'       => 'div', 
				'container_class' => 'footer__menu',
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
	</div>
	
	<!--====  End of Footer  ====-->

</div>

<?php wp_footer(); ?>
</body>
</html>