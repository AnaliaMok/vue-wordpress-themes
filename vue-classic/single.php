<?php
/**
 * File: single.php
 *
 * @package Vue_Classic
 */

get_header();

$post = array();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$post = array(
			'title'   => get_the_title(),
			'content' => apply_filters( 'the_content', get_the_content() ),
		);
	}
}

$post = wp_json_encode( $post );
?>

<div id="app" data-component="Post" data-props='<?php print_r( $post ); ?>'></div>

<?php get_footer(); ?>