<?php
/**
 * File: category.php
 *
 * @package Vue_Classic
 */

get_header();

$category    = get_queried_object();
$category_id = $category->cat_ID;
$cat_name    = $category->name;

$data = array(
	'title'  => 'Category: ' . $cat_name,
	'params' => 'categories=' . $category_id,
);

$data = wp_json_encode( $data );
?>

<div id="app" data-component="Listing" data-props='<?php echo esc_html( $data ); ?>'></div>

<?php get_footer(); ?>
