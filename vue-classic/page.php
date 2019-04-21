<?php
/**
 * File: page.php
 *
 * @package Vue_Classic
 */

get_header();
?>

<?php
$data = array();

if ( have_posts() ) {
	the_post();

	$curr_post_id = get_the_ID();

	if ( ! empty( get_the_post_thumbnail( $curr_post_id, 'banner' ) ) ) {
		$thumbnail = array(
			'alt' => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ),
			'url' => get_the_post_thumbnail_url( $curr_post_id, 'banner' ),
		);
	}

	$data = array(
		'title'     => get_the_title(),
		'content'   => apply_filters( 'the_content', get_the_content() ),
		'thumbnail' => $thumbnail,
	);
}

$data = wp_json_encode( $data );
?>

<div id="app" data-component="Page" data-props='<?php echo esc_html( $data ); ?>'></div>

<?php get_footer(); ?>
