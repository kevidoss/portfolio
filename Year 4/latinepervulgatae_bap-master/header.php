<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Latijn</title>

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/grid.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


	<?php wp_head(); ?>
	</head>

	<body>
		<header>
			<!-- The overlay -->
			<div id="myNavButton" class="overlay">

  		<!-- Button to close the overlay navigation -->
  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  		<!-- Overlay content -->
  			<div class="overlay-content">
						<?php wp_nav_menu( array( 'theme_location' => 'menu' ) ); ?>
  			</div>

			</div>

			<button onclick="openNav()" id="navigation-menu">&#9776; Menu</button>

		</header>

<script>
function openNav() {
    document.getElementById("myNavButton").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNavButton").style.width = "0%";
}
</script>
