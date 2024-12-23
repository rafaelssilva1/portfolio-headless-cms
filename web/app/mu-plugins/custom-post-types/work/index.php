<?php

add_action( 'init', function() {
    $labels = [
        'name'               => __('Work', 'quirk'),
        'singular_name'      => __('Work', 'quirk'),
        'menu_name'          => __('Work', 'quirk'),
        'name_admin_bar'     => __('Work', 'quirk'),
        'add_new'            => __('Add new', 'quirk'),
        'add_new_item'       => __('Add new ', 'quirk'),
        'new_item'           => __('Add new', 'quirk'),
        'edit_item'          => __('Edit Work', 'quirk'),
        'view_item'          => __('View Work', 'quirk'),
        'all_items'          => __('All Work', 'quirk'),
        'search_items'       => __('Find Work', 'quirk'),
        'not_found'          => __('No Work found', 'quirk'),
        'not_found_in_trash' => __('No Work found', 'quirk')
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'work', 
        'graphql_plural_name' => 'works',
        'capability_type'     => 'post',
        'supports'            => [ 'title', 'editor' ],
        'menu_icon'           => 'dashicons-portfolio',
    ];

    register_post_type( 'work', $args );
} );