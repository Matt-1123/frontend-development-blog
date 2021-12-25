<?php

function mattsblog_theme_support() {
	// Adds dynamic title tag support (WP handles itself)
	add_theme_support('title-tag');
	// Allows for customization of theme logo (Themes => Customize => Logo)
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mattsblog_theme_support');

function mattsblog_menus(){
	$locations = array(
		'primary' => "Desktop Primary Left Sidebar",
		'footer' => "Footer Menu Items"
	);
	
	register_nav_menus($locations);
}

add_action('init', 'mattsblog_menus');

function mattsblog_register_styles() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style('mattsblog-style', get_template_directory_uri() . "/style.css", array('mattsblog-bootstrap'), $version, 'all');
	wp_enqueue_style('mattsblog-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", false);
	wp_enqueue_style('mattsblog-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", false);
}

add_action('wp_enqueue_scripts', 'mattsblog_register_styles');

function mattsblog_register_scripts() {
	wp_enqueue_script('mattsblog-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
	wp_enqueue_script('mattsblog-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
	wp_enqueue_script('mattsblog-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
	wp_enqueue_script('mattsblog-script', get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'mattsblog_register_scripts')

?>