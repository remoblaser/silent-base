<?php
return [
    'hierarchical' => true,
    'public' => true,
    'labels' => [
        'name' => __('Teams', 'rb'),
        'singular_name' => __('Team', 'rb'),
        'search_items' => __('Team suchen', 'rb'),
        'all_items' => __('Alle Teams', 'rb'),
        'parent_item' => __('Übergeordnetes Team', 'rb'),
        'parent_item_colon' => __('Übergeordnetes Team:', 'rb'),
        'edit_item' => __('Team editieren', 'rb'),
        'update_item' => __('Team speichern', 'rb'),
        'add_new_item' => __('Neues Team hinzufügen', 'rb'),
        'new_item_name' => __('Neuer Teamname', 'rb'),
        'menu_name' => __('Teams', 'rb'),
    ],
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'team', 'with_front' => false],

];