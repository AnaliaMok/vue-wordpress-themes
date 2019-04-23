<?php
/**
 * File: archive.php
 *
 * @package Vue_JSX
 */

get_header();

$data = array(
	'title'  => 'Blog Post Archive',
);

$data = wp_json_encode( $data );
?>

<div id="app" data-component="Listing" data-props='<?php echo esc_html( $data ); ?>'></div>

<?php get_footer(); ?>
