<?php 
/**
 * Plugin Name:  Headless mode
 * Description:  Redirects requests & disabled Gutenberg editor
 * Version:      1.0.0
 * Author:       quirk
 * Author URI:   https://rafael.quirk.pt/
 * License:      MIT License
*/

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

add_action('template_redirect', function(){
    if (is_admin() or is_user_logged_in()) {
        return;
    }

    $response = [
        'status' => 'error',
        'message' => 'The is a headless wordpress installation. All normal routes are not currently available',
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
});

/*
 * Disables Gutenberg and dequeues all related scripts and styles
*/
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
}, 20 );

/*
 * Disables comments from admin menu
*/
add_action( 'admin_menu', function() {
    remove_menu_page( 'edit-comments.php' );
} );
