<?php
/*
 * Plugin Name:  Custom Post Type Plugin 
 * Description:  Site specific custom post type additions or changes
 * Version:      1.0.0
 * Author:       quirk
 * Author URI:   https://rafael.quirk.pt/
*/

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

$dir = glob(__DIR__ . '/*');

foreach ($dir as $value) {
    if(is_dir($value) and file_exists($value . '/index.php')) {
        include $value . '/index.php';
    }
}

/*
 * Enables thumbnail support for posts
*/
add_action('after_setup_theme', function(){
    add_theme_support('post-thumbnails');
});