<?php
return [
    'labels' => [
        'name'                  => __('Awards', 'rb'),
        'singular_name'         => __('Award', 'rb'),
        'add_new'               => __('Neuer Award', 'rb'),
        'all_items'             => __('Alle Awards', 'rb'),
        'add_new_item'          => __('Neuer Award', 'rb'),
        'edit_item'             => __('Award editieren', 'rb'),
        'new_item'              => __('Neuer Award', 'rb'),
        'view_item'             => __('Award ansehen', 'rb'),
        'search_items'          => __('Award suchen', 'rb'),
        'not_found'             => __('Keine Awards gefunden', 'rb'),
        'not_found_in_trash'    => __('Keine Awards im Papierkorb gefunden', 'rb'),
        'parent_item_colon'     => __('Übergeordneter Award', 'rb'),
        'menu_name'             => __('Awards', 'rb')
    ],
    'public'                => true,
    'has_archive'           => false,
    'publicly_queryable'    => false,
    'query_var'             => true,
    'rewrite'               => ['slug' => 'award', 'with_front' => false],
    'capability_type'       => 'post',
    'hierarchical'          => false,
	'menu_icon'				=> 'dashicons-awards',
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
    'menu_position'         => 6,
    'exclude_from_search'   => true,

];