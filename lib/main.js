jQuery(document).ready(function($) {
	// Trigger for mobile menu
	$('#mobile-trigger').click(function() {
		$('.hamburger-icon').toggleClass('open');
		$('#menu-main-menu').toggleClass('open');
	});
});