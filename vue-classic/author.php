<?php
/**
 * File: author.php
 *
 * @package Vue_Classic
 */

get_header();
?>

<?php
$page = array();

if ( have_posts() ) {
	the_post();

	$post_id = get_the_ID();

	if ( ! empty( get_the_post_thumbnail( $post_id, 'banner' ) ) ) {
		$thumbnail = array(
			'alt' => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ),
			'url' => get_the_post_thumbnail_url( $post_id, 'banner' ),
		);
	}

	$page = array(
		'title'   => get_the_title(),
		'content' => apply_filters( 'the_content', get_the_content() ),
		'thumbnail' => $thumbnail,
	);
}

$data = wp_json_encode( $page );
?>

<div id="app" data-component="Blog" data-props='<?php print_r( $data ); ?>'></div>

<?php get_footer(); ?>