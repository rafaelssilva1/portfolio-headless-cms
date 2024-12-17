<?php
/*
Plugin Name: Custom post type Plugin 
Description: Site specific code changes 
*/

/**
 * 
 * This plugin creates a custom post type called "News" and modifies the labels and icon for the post type.
 * 
 * Functions:
 * - change_post_object(): Modifies the labels and icon for the "post" post type to create a custom post type called "News".
 * 
 * Hooks:
 * - init: Hooks the change_post_object function to the init action to modify the post type.
 * 
 * Note:
 * - Ensure that the plugin is activated to create the custom post type.
 * 
 * Security:
 * - Prevents direct access to the file by checking if ABSPATH is defined.
 */

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

add_action( 'init', 'change_post_object' );
/**
 * Modifies the labels and icon for the "post" post type to create a custom post type called "News".
 *
 * Modifies the labels and icon for the "post" post type to create a custom post type called "News".
 * The custom post type is created on the init action.
 *
 * @since 1.0
 */
function change_post_object() {
	$get_post_type = get_post_type_object('post');
	$labels = $get_post_type->labels;
	$labels->name = 'Projects';
	$labels->singular_name = 'Projects';
	$labels->add_new = 'Add Projects';
	$labels->add_new_item = 'Add Projects';
	$labels->edit_item = 'Edit Projects';
	$labels->new_item = 'Projects';
	$labels->view_item = 'View Projects';
	$labels->search_items = 'Search Projects';
	$labels->not_found = 'No Projects found';
	$labels->not_found_in_trash = 'No Projects found in Trash';
	$labels->all_items = 'All Projects';
	$labels->menu_name = 'Projects';
	$labels->name_admin_bar = 'Projects';
	$get_post_type->menu_icon = 'dashicons-editor-ul'; // https://developer.wordpress.org/resource/dashicons/#newspaper_icon
}