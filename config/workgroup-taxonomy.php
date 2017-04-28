<?php
return [
    'hierarchical' => true,
    'public' => true,
    'labels' => [
        'name' => __('Workgroups', 'rb'),
        'singular_name' => __('Workgroup', 'rb'),
        'search_items' => __('Workgroup suchen', 'rb'),
        'all_items' => __('Alle Workgroups', 'rb'),
        'parent_item' => __('Übergeordnete Workgroup', 'rb'),
        'parent_item_colon' => __('Übergeordnete Workgroup:', 'rb'),
        'edit_item' => __('Workgroup editieren', 'rb'),
        'update_item' => __('Workgroup speichern', 'rb'),
        'add_new_item' => __('Neue Workgroup hinzufügen', 'rb'),
        'new_item_name' => __('Neuer Workgroupname', 'rb'),
        'menu_name' => __('Workgroups', 'rb'),
    ],
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'workgroup', 'with_front' => false],

];