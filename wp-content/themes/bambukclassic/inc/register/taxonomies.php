<?php

add_action('init', 'create_bambuk_taxonomies', 2);

function create_bambuk_taxonomies()
{
    /**
     * Taxonomy: News
     */
    $news_taxonomy_args = [
        'labels' => [
            'name' => 'News',
            'singular_name' => 'News',
        ],
        'public' => false,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_in_rest' => true,
    ];

    register_taxonomy('news', ['news-media'], $news_taxonomy_args);

    /**
     * Taxonomy: Media
     */
    $media_taxonomy_args = [
        'labels' => [
            'name' => 'Media',
            'singular_name' => 'Media',
        ],
        'public' => false,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_in_rest' => true,
    ];

    register_taxonomy('medias', ['news-media'], $media_taxonomy_args);
}
