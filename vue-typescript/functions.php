<?php
/**
 * File: functions.php
 *
 * Extended functionality for theme.
 *
 * @package Vue_Classic
 */

define( 'THEME_URI', get_template_directory_uri() );
define( 'ASSET_DIR', THEME_URI . '/assets/img/' );

/**
 * Enqueue compiled theme styles and scripts.
 *
 * @return void
 */
function vueclassic_styles() {
	wp_enqueue_style( 'vueclassic-styles', THEME_URI . '/dist/css/styles.min.css', array(), date( 'H:i:s' ) );

	if ( ! is_404() ) {
		wp_enqueue_script( 'vueclassic-scripts', THEME_URI . '/dist/js/main.js', array(), date( 'H:i:s' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'vueclassic_styles' );

if ( function_exists( 'add_theme_support' ) ) {
	// Add Menu Support.
	add_theme_support( 'menus' );

	// Add Thumbnail Theme Support.
	add_theme_support( 'post-thumbnails' );

	// Custom Thumbnail Sizes.
	add_image_size( 'banner', 1280, 720, true );
	add_image_size( 'blog-post', 768, 512, true );
}

/**
 * Define navigation locations.
 *
 * @return void
 */
function register_vueclassic_menu() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', 'vueclassic' ), // Main Navigation.
			'footer-menu' => __( 'Footer Menu', 'vueclassic' ), // Footer Navigation.
		)
	);
}
add_action( 'init', 'register_vueclassic_menu' );

// Shrink excerpt length.
apply_filters( 'excerpt_length', 25 );

/**
 * Filters REST response for default post type.
 *
 * @param WP_REST_Response $data - The response object.
 * @param WP_Post          $post - Post object.
 * @param WP_REST_Request  $request - Request object.
 * @return WP_REST_Reponse Modified resposne object.
 */
function vueclassic_prepare_post( $data, $post, $request ) {
	// Trim excerpt.
	$excerpt                           = wp_trim_words( $data->data['excerpt']['rendered'] );
	$data->data['excerpt']['rendered'] = wp_json_encode( $excerpt );

	return $data;
}
add_filter( 'rest_prepare_post', 'vueclassic_prepare_post', 10, 3 );
