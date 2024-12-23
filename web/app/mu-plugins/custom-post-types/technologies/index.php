<?php

add_action( 'init', function() {
    $labels = [
        'name'               => __('Technologies', 'quirk'),
        'singular_name'      => __('Technology', 'quirk'),
        'menu_name'          => __('Technologies', 'quirk'),
        'name_admin_bar'     => __('Technologies', 'quirk'),
        'add_new'            => __('Add new', 'quirk'),
        'add_new_item'       => __('Add new ', 'quirk'),
        'new_item'           => __('Add new', 'quirk'),
        'edit_item'          => __('Edit Technologies', 'quirk'),
        'view_item'          => __('View Technologies', 'quirk'),
        'all_items'          => __('All Technologies', 'quirk'),
        'search_items'       => __('Find Technologies', 'quirk'),
        'not_found'          => __('No Technologies found', 'quirk'),
        'not_found_in_trash' => __('No Technologies found', 'quirk')
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'technology_cpt', 
        'graphql_plural_name' => 'technologies_cpt',
        'capability_type'     => 'post',
        'supports'            => [ 'title', 'thumbnail' ],
        'menu_icon'           => 'dashicons-admin-generic',
    ];

    register_post_type( 'technologies', $args );
} );