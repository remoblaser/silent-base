<?php
return [
    'labels' => [
        'name'                  => __('Sponsoren', 'rb'),
        'singular_name'         => __('Sponsor', 'rb'),
        'add_new'               => __('Neuer Sponsor', 'rb'),
        'all_items'             => __('Alle Sponsoren', 'rb'),
        'add_new_item'          => __('Neuer Sponsor', 'rb'),
        'edit_item'             => __('Sponsor editieren', 'rb'),
        'new_item'              => __('Neuer Sponsor', 'rb'),
        'view_item'             => __('Sponsor ansehen', 'rb'),
        'search_items'          => __('Sponsor suchen', 'rb'),
        'not_found'             => __('Keine Sponsoren gefunden', 'rb'),
        'not_found_in_trash'    => __('Keine Sponsoren im Papierkorb gefunden', 'rb'),
        'parent_item_colon'     => __('Übergeordneter Sponsor', 'rb'),
        'menu_name'             => __('Sponsoren', 'rb')
    ],
    'with_front'            => false,
    'public'                => true,
    'has_archive'           => true,
    'publicly_queryable'    => true,
    'query_var'             => true,
    'rewrite'               => true,
    'capability_type'       => 'post',
    'hierarchical'          => false,
    'supports' => [
        'title',
        //'editor',
        //'excerpt',
        //'thumbnail',
        //'author',
        //'trackbacks',
        //'custom-fields',
        //'comments',
        'revisions',
        //'page-attributes', // (menu order, hierarchical must be true to show Parent option)
        //'post-formats',
    ],
    'taxonomies' => [// add default post categories and tags
    ], 
    'menu_position'         => 7,
    'exclude_from_search'   => false,

];