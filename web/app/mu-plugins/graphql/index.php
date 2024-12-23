<?php
/**
 * Plugin Name:  Graphql Configuration
 * Description:  Registers fields and whitelists routes
 * Version:      1.0.0
 * Author:       quirk
 * Author URI:   https://rafael.quirk.pt/
 * License:      MIT License
 */

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

$dir = glob(__DIR__ . '/*');

foreach ($dir as $value) {
    if(is_dir($value) and file_exists($value . '/index.php')) {
        include $value . '/index.php';
    }
}
