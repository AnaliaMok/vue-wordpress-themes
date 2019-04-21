<?php
/**
 * File: category.php
 *
 * @package Vue_Classic
 */

get_header();

$category = get_queried_object();
$cat_ID = $category->cat_ID;
$cat_name = $category->name;

$data = array(
	'title' => 'Category: ' . $cat_name,
	'params' => 'categories=' . $cat_ID,
);

$data = wp_json_encode( $data );
?>

<div id="app" data-component="Listing" data-props='<?php print_r( $data ); ?>'></div>

<?php get_footer(); ?>
