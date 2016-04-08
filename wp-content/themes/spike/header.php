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
	<meta property="og:url" content="<?= home_url();?>"/>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:image" content="<?= home_url();?>/wp-content/uploads/2016/04/CareerProudv2.jpg">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TVJRPH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TVJRPH');</script>
<!-- End Google Tag Manager -->

<div class="site">
	<header class="site-header" role="banner">
	<div class="contain">
		<div class="site-branding">
			<div class="site-description">
				<h2>The Short Road to Long-Term</h2>
				<span class="fancy-font">Career Success</span><span class="period">.</span>
			</div>
			<div class="site-logo">
				<a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/rm_logo.svg" class="logo" alt="RM">
					<h1 class="site-title"><span class="first-word">Risk</span> Management Careers</h1>
				</a>
			</div>
		</div>
	</div>
	</header><!-- #masthead -->

	<div class="site-content">
