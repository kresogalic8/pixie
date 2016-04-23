<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<div class="input-floating">
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" required />
		<label for="s"><?php _e('Search:'); ?></label>
	</div>

	<input type="submit" id="searchsubmit" value="GO" />
</form>