<?php
/**
 * File: page-blog.php
 *
 * Blog page template.
 *
 * @package Vue_JSX
 */

get_header();

$data = array();

// Get blog page content first.
if ( have_posts() ) {
	while ( have_posts() ) {
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
			'thumbnail' => $thumbnail,
			'content'   => apply_filters( 'the_content', get_the_content() ),
		);
	}
}

$data = wp_json_encode( $data );
?>

<div id="app" data-component="Blog" data-props='<?php echo esc_html( $data ); ?>'></div>

<?php get_footer(); ?>
