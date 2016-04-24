<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-floating">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'pixie' ); ?></span>
		<input type="text" value="<?php get_the_search_query(); ?>" name="s" id="s" required />
		<label for="s"><?php echo esc_attr__( 'Search:', 'pixie' ); ?></label>
	</div>

	<input type="submit" id="searchsubmit" value="GO" />
</form>