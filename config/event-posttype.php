<?php
return [
	'labels' => [
		'name'                  => __('Events', 'rb'),
		'singular_name'         => __('Event', 'rb'),
		'add_new'               => __('Neuer Event', 'rb'),
		'all_items'             => __('Alle Events', 'rb'),
		'add_new_item'          => __('Neuer Event', 'rb'),
		'edit_item'             => __('Event editieren', 'rb'),
		'new_item'              => __('Neuer Event', 'rb'),
		'view_item'             => __('Event ansehen', 'rb'),
		'search_items'          => __('Event suchen', 'rb'),
		'not_found'             => __('Keine Events gefunden', 'rb'),
		'not_found_in_trash'    => __('Keine Events im Papierkorb gefunden', 'rb'),
		'parent_item_colon'     => __('Übergeordneter Event', 'rb'),
		'menu_name'             => __('Events', 'rb')
	],
	'public'                => true,
	'has_archive'           => false,
	'publicly_queryable'    => false,
	'query_var'             => true,
	'rewrite'               => ['slug' => 'event', 'with_front' => false],
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
	'menu_position'         => 6,
	'exclude_from_search'   => false,

];