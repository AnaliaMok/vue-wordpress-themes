<?php
/**
 * File: single.php
 *
 * @package Vue_JSX
 */

get_header();

$post_data = array();

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

		$author_id   = get_the_author_meta( 'ID' );
		$author_name = get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' );

		if ( strlen( $author_name ) <= 1 ) {
			$author_name = get_the_author_meta( 'nickname' );
		}

		$post_data = array(
			'title'     => get_the_title(),
			'content'   => apply_filters( 'the_content', get_the_content() ),
			'thumbnail' => $thumbnail,
			'date'      => get_the_date(),
			'author'    => array(
				'name' => $author_name,
				'link' => get_author_posts_url( $author_id ),
			),
		);
	}
}

$post_data = wp_json_encode( $post_data );
?>

<div id="app" data-component="Post" data-props='<?php echo esc_html( $post_data ); ?>'></div>

<?php get_footer(); ?>
