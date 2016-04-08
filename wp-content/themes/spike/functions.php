<?php
/**
 * Spike functions and definitions
 *
 * @package Spike
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spike_setup() {
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	// Add featured image support to posts and pages
	//add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	
	// EditURI link.
	remove_action( 'wp_head', 'rsd_link' );

	// Category feed links.
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Post and comment feed links.
	remove_action( 'wp_head', 'feed_links', 2 );

	// Windows Live Writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Index link.
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Start link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Canonical.
	remove_action( 'wp_head', 'rel_canonical', 10, 0 );

	// Shortlink.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Links for adjacent posts.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// WP version.
	remove_action( 'wp_head', 'wp_generator' );

	// Emoji detection script.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

	// Emoji styles.
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Disable json API
	add_filter('rest_enabled', '_return_false');
	add_filter('rest_jsonp_enabled', '_return_false');
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	
}
add_action( 'after_setup_theme', 'spike_setup' );


/**
 * Enqueue scripts and styles.
 */
function spike_scripts() {
	wp_enqueue_style( 'spike-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* 	wp_dequeue_script( 'contact-form-7' ); */
	wp_dequeue_style( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'spike_scripts' );

// [sharebox]
function share_box( $atts ) {
	$url = urlencode( home_url('/') );
	$text = rawurlencode('Check out "The Short Road to Long-Term Career Success"');
	$output = '<div class="sbox"><h2 class="green-bg">Share this free e-book:</h2><ul>';

	$output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'"><i class="fb"></i><span>facebook</span></a></li>';
	$output .= '<li><a href="mailto:?body='.$text.'%20'.$url.'&subject='.$text.'"><i class="em"></i><span>email</span></a></li></ul><ul>';
	$output .= '<li><a href="https://twitter.com/intent/tweet?text='.$text.'&url='.$url.'"><i class="tw"></i><span>twitter</span></a></li>';
	$output .= '<li><a href="whatsapp://send?text='.$text.'%20'.$url.'"><i class="wa"></i><span>whatsapp</span></a></li>';
	
	$output .= '</ul></div>';
	return $output;
}
add_shortcode( 'sharebox', 'share_box' );
