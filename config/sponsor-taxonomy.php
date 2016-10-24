<?php
return [
    'hierarchical' => true,
    'public' => true,
    'labels' => [
        'name' => __('Sponsorenlevels', 'rb'),
        'singular_name' => __('Sponsorenlevel', 'rb'),
        'search_items' => __('Sponsorenlevel suchen', 'rb'),
        'all_items' => __('Alle Sponsorenlevel', 'rb'),
        'parent_item' => __('Übergeordnetes Sponsorenlevel', 'rb'),
        'parent_item_colon' => __('Übergeordnetes Sponsorenlevel:', 'rb'),
        'edit_item' => __('Sponsorenlevel editieren', 'rb'),
        'update_item' => __('Sponsorenlevel speichern', 'rb'),
        'add_new_item' => __('Neues Sponsorenlevel hinzufügen', 'rb'),
        'new_item_name' => __('Neuer Name', 'rb'),
        'menu_name' => __('Sponsorenlevels', 'rb'),
    ],
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'sponsortype'],

];