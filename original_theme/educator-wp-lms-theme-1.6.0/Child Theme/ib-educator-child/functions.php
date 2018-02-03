<?php

/**
 * Enqueue scripts and styles.
 */
function educator_child_enqueue_scripts() {
	wp_enqueue_style( 'educator-child', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'educator_child_enqueue_scripts', 20 );