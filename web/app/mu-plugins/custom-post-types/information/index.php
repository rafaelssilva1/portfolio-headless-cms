<?php

add_action( 'init', function() {
    $labels = [
        'name'               => __('Information', 'quirk'),
        'singular_name'      => __('Information', 'quirk'),
        'menu_name'          => __('Information', 'quirk'),
        'name_admin_bar'     => __('Information', 'quirk'),
        'add_new'            => __('Add new', 'quirk'),
        'add_new_item'       => __('Add new ', 'quirk'),
        'new_item'           => __('Add new', 'quirk'),
        'edit_item'          => __('Edit Information', 'quirk'),
        'view_item'          => __('View Information', 'quirk'),
        'all_items'          => __('All Information', 'quirk'),
        'search_items'       => __('Find Information', 'quirk'),
        'not_found'          => __('No Information found', 'quirk'),
        'not_found_in_trash' => __('No Information found', 'quirk')
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'information', 
        'graphql_plural_name' => 'informations',
        'capability_type'     => 'post',
        'supports'            => [ 'title', 'editor' ],
        'menu_icon'           => 'dashicons-info',
    ];

    register_post_type( 'information', $args );
} );