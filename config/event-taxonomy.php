<?php
return [
    'hierarchical' => true,
    'public' => true,
    'labels' => [
        'name' => __('Events', 'rb'),
        'singular_name' => __('Event', 'rb'),
        'search_items' => __('Event suchen', 'rb'),
        'all_items' => __('Alle Events', 'rb'),
        'parent_item' => __('Übergeordnetes Event', 'rb'),
        'parent_item_colon' => __('Übergeordnetes Event:', 'rb'),
        'edit_item' => __('Event editieren', 'rb'),
        'update_item' => __('Event speichern', 'rb'),
        'add_new_item' => __('Neues Event hinzufügen', 'rb'),
        'new_item_name' => __('Neuer Eventname', 'rb'),
        'menu_name' => __('Events', 'rb'),
    ],
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'event'],

];