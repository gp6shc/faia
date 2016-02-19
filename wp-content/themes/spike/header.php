<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Spike
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<?php wp_head(); ?>
	<link href='https://fonts.googleapis.com/css?family=Dancing+Script:700&text=ucares' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<div class="site">
	<header class="site-header" role="banner">
	<div class="contain">
		<div class="site-branding">
			<div class="site-description">
				<h2>The Short Road to Long-Term</h2>
				<span class="fancy-font">Career Success.</span>
			</div>
			<div class="site-logo">
				<a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/risk_management_logo.svg" class="logo" alt="RM">
					<h1 class="site-title"><span class="first-word">Risk</span> Management Careers</h1>
				</a>
			</div>
		</div>
	</div>
	</header><!-- #masthead -->

	<div class="site-content">
