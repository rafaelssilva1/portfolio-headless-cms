<?php

add_action( 'init', function() {
    $labels = [
        'name'               => __('Social', 'quirk'),
        'singular_name'      => __('Social', 'quirk'),
        'menu_name'          => __('Social', 'quirk'),
        'name_admin_bar'     => __('Social', 'quirk'),
        'add_new'            => __('Add new', 'quirk'),
        'add_new_item'       => __('Add new ', 'quirk'),
        'new_item'           => __('Add new', 'quirk'),
        'edit_item'          => __('Edit Social', 'quirk'),
        'view_item'          => __('View Social', 'quirk'),
        'all_items'          => __('All Social', 'quirk'),
        'search_items'       => __('Find Social', 'quirk'),
        'not_found'          => __('No Social found', 'quirk'),
        'not_found_in_trash' => __('No Social found', 'quirk')
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'social', 
        'graphql_plural_name' => 'socials',
        'capability_type'     => 'post',
        'supports'            => [ 'title', 'thumbnail' ],
        'menu_icon'           => 'dashicons-share',
    ];

    register_post_type( 'social', $args );
} );