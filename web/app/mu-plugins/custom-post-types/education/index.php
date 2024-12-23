<?php

add_action( 'init', function() {
    $labels = [
        'name'               => __('Education', 'quirk'),
        'singular_name'      => __('Education', 'quirk'),
        'menu_name'          => __('Education', 'quirk'),
        'name_admin_bar'     => __('Education', 'quirk'),
        'add_new'            => __('Add new', 'quirk'),
        'add_new_item'       => __('Add new ', 'quirk'),
        'new_item'           => __('Add new', 'quirk'),
        'edit_item'          => __('Edit Education', 'quirk'),
        'view_item'          => __('View Education', 'quirk'),
        'all_items'          => __('All Education', 'quirk'),
        'search_items'       => __('Find Education', 'quirk'),
        'not_found'          => __('No Education found', 'quirk'),
        'not_found_in_trash' => __('No Education found', 'quirk')
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'show_ui'             => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'education', 
        'graphql_plural_name' => 'educations',
        'capability_type'     => 'post',
        'supports'            => [ 'title', 'editor' ],
        'menu_icon'           => 'dashicons-welcome-learn-more',
    ];

    register_post_type( 'education', $args );
} );