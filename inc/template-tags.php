<?php
/**
 * Custom Pixie template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Pixie
 * @since Pixie 1.0
 */

if ( ! function_exists( 'pixie_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own pixie_entry_meta() function to override in a child theme.
 *
 * @since Pixie 1.0
 */
function pixie_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'pixie_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'pixie' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		pixie_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'pixie' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		pixie_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'pixie' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'pixie_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own pixie_entry_date() function to override in a child theme.
 *
 * @since Pixie 1.0
 */
function pixie_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'pixie' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'pixie_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own pixie_entry_taxonomies() function to override in a child theme.
 *
 * @since Pixie 1.0
 */
function pixie_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'pixie' ) );
	if ( $categories_list && pixie_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'pixie' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'pixie' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'pixie' ),
			$tags_list
		);
	}
}
endif;

/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own pixie_categorized_blog() function to override in a child theme.
 *
 * @since Pixie 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function pixie_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'pixie_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pixie_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so pixie_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so pixie_categorized_blog should return false.
		return false;
	}
}

/**
 * Flushes out the transients used in pixie_categorized_blog().
 *
 * @since Pixie 1.0
 */
function pixie_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'pixie_categories' );
}
add_action( 'edit_category', 'pixie_category_transient_flusher' );
add_action( 'save_post',     'pixie_category_transient_flusher' );