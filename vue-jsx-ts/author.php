<?php
/**
 * File: author.php
 *
 * @package Vue_JSX_Typescript
 */

get_header();
?>

<?php
$data               = array();
$curauth            = get_userdata( intval( $author ) );
$author_description = $curauth->description;
$author_name        = $curauth->display_name;

if ( ! empty( $curauth->first_name ) && ! empty( $curauth->last_name ) ) {
	$author_name = $curauth->first_name . ' ' . $curauth->last_name;
}

$data = array(
	'title'   => $author_name,
	'content' => $author_description,
	'params'  => 'author=' . $curauth->ID,
);

$data = wp_json_encode( $data );
?>

<div id="app" data-component="Listing" data-props='<?php echo esc_html( $data ); ?>'></div>

<?php get_footer(); ?>
