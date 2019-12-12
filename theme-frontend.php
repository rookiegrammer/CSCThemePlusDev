<?php

// Add CSS
function wpcsc_theme_styles() {
	wp_enqueue_style('font-awesome_css', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.min.css', array(), '6.3.0', 'all');
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');

}
add_action('wp_enqueue_scripts', 'wpcsc_theme_styles');

// Add JS
function wpcsc_theme_js() {
    wp_enqueue_script( 'what-input_js', get_template_directory_uri() . '/js/what-input.js', array(), '', true );
    wp_enqueue_script( 'sparallax_js', get_template_directory_uri() . '/js/simpleparallax.min.js', array('jquery'), true );
    wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '6.3.0', true );
	wp_enqueue_script( 'app_js', get_template_directory_uri() . '/js/app.min.js', array('jquery', 'foundation_js', 'sparallax_js'), '', true );
}
add_action('wp_enqueue_scripts', 'wpcsc_theme_js');

?>
