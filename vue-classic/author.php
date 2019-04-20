<?php
/**
 * File: author.php
 *
 * @package Vue_Classic
 */

get_header();
?>

<?php
$page    = array();
$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
$author_description = $curauth->description;
$author_name = $curauth->display_name;

if ( ! empty( $curauth->first_name ) && ! empty( $curauth->last_name ) ) {
	$author_name = $curauth->first_name . ' ' . $curauth->last_name;
}

$page = array(
	'title'   => $author_name,
	'content' => $author_description,
	'params'  => 'author=' . $curauth->ID,
);

$data = wp_json_encode( $page );
?>

<div id="app" data-component="Listing" data-props='<?php print_r( $data ); ?>'></div>

<?php get_footer(); ?>