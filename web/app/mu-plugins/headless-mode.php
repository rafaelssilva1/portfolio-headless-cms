<?php 
/**
 * Plugin Name:  Headless mode
 * Description:  Redirects requests 
 * Version:      1.0.0
 * Author:       Quirk
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