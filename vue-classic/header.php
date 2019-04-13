<?php
/**
 * File: header.php
 *
 * Header Template partial.
 *
 * @package Vue_Classic
 */
?>

<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<title><?php wp_title('');?><?php if (wp_title('', false)) {echo ' :';}?> <?php bloginfo('name');?></title>
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description');?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montserrat" rel="stylesheet">

	<?php wp_head();?>
</head>
<body <?php body_class();?>>
	<header>
		<nav class="bg-blue-darker">
			<?php wp_nav_menu(array(
				'echo'		 => true,
				'menu' 		 => 'header-menu',
				'menu_class' => 'container mx-auto list-reset font-display flex justify-end items-center',
				'container'  => 'ul',
			)); ?>
		</nav>
	</header>