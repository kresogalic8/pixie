jQuery(document).ready(function($) {
	// Trigger for mobile menu
	$('#mobile-trigger').click(function() {
		$('.hamburger-icon').toggleClass('open');
		$('#menu-main-menu').toggleClass('open');
	});

	// Search form
	$('.search-icon, .close-icon').click(function(event) {
		$('.search-wrapper').toggleClass('open');
	});

});