<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s"><?php echo esc_attr__( 'Search:', 'pixie' ); ?></label>
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" required />

	<input type="submit" id="searchsubmit" value="GO" />
</form>