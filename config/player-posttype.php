<?php
return [
    'labels' => [
        'name'                  => __('Spieler', 'rb'),
        'singular_name'         => __('Spieler', 'rb'),
        'add_new'               => __('Neuer Spieler', 'rb'),
        'all_items'             => __('Alle Spieler', 'rb'),
        'add_new_item'          => __('Neuer Spieler', 'rb'),
        'edit_item'             => __('Spieler editieren', 'rb'),
        'new_item'              => __('Neuer Spieler', 'rb'),
        'view_item'             => __('Spieler ansehen', 'rb'),
        'search_items'          => __('Spieler suchen', 'rb'),
        'not_found'             => __('Keine Spieler gefunden', 'rb'),
        'not_found_in_trash'    => __('Keine Spieler im Papierkorb gefunden', 'rb'),
        'parent_item_colon'     => __('Übergeordneter Spieler', 'rb'),
        'menu_name'             => __('Spieler', 'rb')
    ],
    'with_front'            => false,
    'public'                => true,
    'has_archive'           => false,
    'publicly_queryable'    => false,
    'query_var'             => true,
    'rewrite'               => false,
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
        'teams'
    ], 
    'menu_position'         => 5,
    'exclude_from_search'   => false,

];