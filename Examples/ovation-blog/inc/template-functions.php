<?php
/**
 * Additional features to allow styling of the templates
 *
 * @subpackage Ovation Blog
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ovation_blog_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'ovation-blog-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'ovation-blog-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'ovation_blog_body_classes' );

function ovation_blog_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Pagination for blog post.
 */
function ovation_blog_render_blog_pagination() {
	$ovation_blog_pagination_type = get_theme_mod( 'ovation_blog_pagination_type', 'numbered' );
	if ($ovation_blog_pagination_type == 'default') {
		the_posts_navigation(array(
            'prev_text'          => __( 'Previous page', 'ovation-blog' ),
            'next_text'          => __( 'Next page', 'ovation-blog' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ovation-blog' ) . ' </span>',
        ) );
	}
	else if($ovation_blog_pagination_type == 'numbered'){
		the_posts_pagination( array(
            'prev_text'          => __( 'Previous page', 'ovation-blog' ),
            'next_text'          => __( 'Next page', 'ovation-blog' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ovation-blog' ) . ' </span>',
        ) );
	}
}
add_action( 'ovation_blog_blog_pagination', 'ovation_blog_render_blog_pagination', 10 );

/**
 * Pagination for single post.
 */
function ovation_blog_render_single_post_pagination() {
	$ovation_blog_single_post_pagination_type = get_theme_mod( 'ovation_blog_single_post_pagination_type', 'default' );
	if ($ovation_blog_single_post_pagination_type == 'default') {
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'ovation-blog' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'ovation-blog' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'ovation-blog' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'ovation-blog' ) . '</span> ',
		) );
	}
	else if($ovation_blog_single_post_pagination_type == 'post-name'){
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'ovation-blog' ) . '</span><span class="nav-title">%title</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'ovation-blog' ) . '</span><span class="nav-title">%title</span>',
		) );
	}
}
add_action( 'ovation_blog_single_post_pagination', 'ovation_blog_render_single_post_pagination', 10 );