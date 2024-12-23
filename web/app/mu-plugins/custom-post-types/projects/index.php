<?php

/**
 * Modifies the labels and icon for the "post" post type to create a custom post type called "Projects".
 *
 * Modifies the labels and icon for the "post" post type to create a custom post type called "Projects".
 * The custom post type is created on the init action.
 *
 * @since 1.0
 */

add_action( 'init', function() {
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

	unregister_taxonomy_for_object_type('post_tag', 'post');
	unregister_taxonomy_for_object_type('category', 'post');
} );
