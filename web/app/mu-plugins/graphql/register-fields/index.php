<?php

add_action('graphql_register_types', function () {
    register_graphql_object_type('GenericElement', [
        'description' => __('A generic item with title, icon and order', 'quirk'),
        'fields' => [
            'title' => [
                'type' => 'String',
                'description' => __('The name of the item', 'quirk'),
            ],
            'icon' => [
                'type' => 'String',
                'description' => __('The icon of the item', 'quirk'),
            ],
            'link' => [
                'type' => 'String',
                'description' => __('Link', 'quirk'),
            ],
            'order' => [
                'type' => 'Number',
                'description' => __('Rendering order', 'quirk'),
            ],
        ],
    ]);
    register_graphql_object_type('Details', [
        'description' => __('Details', 'quirk'),
        'fields' => [
            'name' => [
                'type' => 'String',
                'description' => __('Name', 'quirk'),
            ],
            'role' => [
                'type' => 'String',
                'description' => __('Role', 'quirk'),
            ],
            'location' => [
                'type' => 'String',
                'description' => __('Location', 'quirk'),
            ],
            'phone' => [
                'type' => 'String',
                'description' => __('Phone', 'quirk'),
            ],
            'email' => [
                'type' => 'String',
                'description' => __('Email', 'quirk'),
            ],
            'summary' => [
                'type' => 'String',
                'description' => __('Summary', 'quirk'),
            ],
            'social' => [
                'type' => ['list_of' => 'GenericElement'],
                'description' => __('Social', 'quirk'),
            ],
            'photo' => [
                'type' => 'String',
                'description' => __('Photo', 'quirk'),
            ],
        ],
    ]);

    register_graphql_fields('Post', [
        'technologies' => [
            'type' => ['list_of' => 'GenericElement'],
            'description' => __('Returns all selected technologies for the respective project', 'quirk'),
            'resolve' => function () {
                $pod = pods('post', get_the_ID());
                $related_technologies = $pod->field('technologies');

                if (empty($related_technologies)) {
                    return null;
                }

                $technologies = [];
                foreach ($related_technologies as $tech) {
                    $url = get_the_post_thumbnail_url($tech['ID']);
                    $svg = file_get_contents($url);
                    $el = [
                        'title' => get_the_title($tech['ID']),
                        'icon' => $svg,
                        'order' => intval(get_post_meta($tech['ID'], 'order', true)),
                    ];
                    array_push($technologies, $el);
                }

                return $technologies;
            }
        ],
    ]);

    register_graphql_fields('Education', [
        'school' => [
            'type' => 'String',
            'description' => __('School name', 'quirk'),
            'resolve' => function () {
                $school = get_post_meta(get_the_ID(), 'school', true);
                return $school;
            }
        ],
        'grade' => [
            'type' => 'String',
            'description' => __('Grade', 'quirk'),
            'resolve' => function () {
                $grade = get_post_meta(get_the_ID(), 'grade', true);

                if (empty($grade)) {
                    return null;
                }

                return $grade;
            }
        ],
        'startDate' => [
            'type' => 'String',
            'description' => __('Start date', 'quirk'),
            'resolve' => function () {
                $date = get_post_meta(get_the_ID(), 'start_date', true);
                $start_date = date('M Y', strtotime($date));
                return $start_date;
            }
        ],
        'endDate' => [
            'type' => 'String',
            'description' => __('End date', 'quirk'),
            'resolve' => function () {
                $date = get_post_meta(get_the_ID(), 'end_date', true);

                if ($date === '0000-00-00') {
                    return null;
                }

                $end_date = date('M Y', strtotime($date));
                return $end_date;
            }
        ],
        'order' => [
            'type' => 'Number',
            'description' => __('Order', 'quirk'),
            'resolve' => function () {
                $order = get_post_meta(get_the_ID(), 'order', true);
                return $order;
            }
        ],
    ]);

    register_graphql_fields('Work', [
        'company' => [
            'type' => 'String',
            'description' => __('Company name', 'quirk'),
            'resolve' => function () {
                $company = get_post_meta(get_the_ID(), 'company', true);

                if (empty($company)) {
                    return null;
                }

                return $company;
            }
        ],
        'startDate' => [
            'type' => 'String',
            'description' => __('Start date', 'quirk'),
            'resolve' => function () {
                $date = get_post_meta(get_the_ID(), 'start_date', true);
                $start_date = date('M Y', strtotime($date));
                return $start_date;
            }
        ],
        'endDate' => [
            'type' => 'String',
            'description' => __('End date', 'quirk'),
            'resolve' => function () {
                $date = get_post_meta(get_the_ID(), 'end_date', true);

                if ($date === '0000-00-00') {
                    return null;
                }

                $end_date = date('M Y', strtotime($date));
                return $end_date;
            }
        ],
        'order' => [
            'type' => 'Number',
            'description' => __('Order', 'quirk'),
            'resolve' => function () {
                $order = get_post_meta(get_the_ID(), 'order', true);
                return $order;
            }
        ],
    ]);

    register_graphql_fields('RootQuery', [
        'details' => [
            'type' => 'Details',
            'description' => __('Details', 'quirk'),
            'resolve' => function () {
                $name = get_option(option: 'details_name_n');
                $role = get_option('details_role');
                $location = get_option('details_location');
                $phone = get_option('details_phone');
                $email = get_option('details_email');
                $summary = get_option('details_summary');

                $id = get_option('details_photo');
                $photo = wp_get_attachment_url($id[0]);
                
                $socialIds = get_option('details_social');

                $social = [];
                foreach ($socialIds as $item) {
                    $url = get_the_post_thumbnail_url($item);
                    $svg = file_get_contents($url);
                    $el = [
                        'title' => get_the_title($item),
                        'icon' => $svg,
                        'link' => get_post_meta($item, 'link', true),
                        'order' => intval(get_post_meta($item, 'order', true)),
                    ];
                    array_push($social, $el);
                }

                return [
                    'name' => $name,
                    'role' => $role,
                    'location' => $location,
                    'phone' => $phone,
                    'email' => $email,
                    'summary' => $summary,
                    'social' => $social,
                    'photo' => $photo,
                ];
            }
        ],
    ]);
});
