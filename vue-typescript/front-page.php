<?php
/**
 * File: home.php
 *
 * @package Vue_Typescript
 */

get_header();

$data = array();

// Page Content.
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
		);
	}
}
wp_reset_postdata();

// Example of using WP_Query explicitly versus the rest api in the client.
// Retrieve latest 3 posts.
$latest_posts = get_posts(
	array(
		'numberposts' => 4,
	)
);

$data['latestposts'] = array_map(
	function( $post ) {

		if ( ! empty( get_the_post_thumbnail( $post->ID, 'medium_large' ) ) ) {
			$thumbnail = array(
				'alt' => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ),
				'url' => get_the_post_thumbnail_url( $post->ID, 'medium_large' ),
			);
		}

		$author_id   = intval( $post->post_author );
		$author_name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );

		if ( strlen( $author_name ) <= 1 ) {
			$author_name = get_the_author_meta( 'nickname', $author_id );
		}

		return array(
			'id'		=> $post->ID,
			'title'     => $post->post_title,
			'slug'		=> get_the_permalink( $post->ID ),
			'date'      => $post->post_date,
			'thumbnail' => $thumbnail,
			'author'    => array(
				'name' => $author_name,
				'link' => get_author_posts_url( $author_id ),
			),
		);
	},
	$latest_posts
);

$data = wp_json_encode( $data );
?>

<div id="app" data-component="FrontPage" data-props='<?php echo esc_html( $data ); ?>'></div>

<?php get_footer(); ?>
