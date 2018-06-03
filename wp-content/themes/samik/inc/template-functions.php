<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package samik
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function samik_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'samik_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function samik_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'samik_pingback_header' );




/**
 * Add custom icon fonts.
 */
add_filter(
    'fw:option_type:icon-v2:packs',
    '_add_more_packs'
);

function _add_more_packs($default_packs) {
    return array(
        'iconFont' => array(
            'name' => 'iconFont',
            'css_class_prefix' => 'icon',
            'css_file' => get_template_directory() . '/theme/build/fonts/iconFont/iconFont.css',
            'css_file_uri' => get_template_directory_uri() . '/theme/build/fonts/iconFont/iconFont.css'
        )
    );
}
