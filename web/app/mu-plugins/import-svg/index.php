<?php
/**
 * Plugin Name:  Allow SVG Import
 * Description:  Allows users to import svg files
 * Version:      1.0.0
 * Author:       quirk
 * Author URI:   https://rafael.quirk.pt/
 * License:      MIT License
 */

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

/**
 * Adds a filter to modify the allowed file types for uploads.
 *
 * This filter allows SVG files to be uploaded if the current user has the capability to manage options.
 *
 * @param array $allowed The array of allowed file types.
 * @return array The modified array of allowed file types.
 */

add_filter( 'upload_mimes', function ( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
});
