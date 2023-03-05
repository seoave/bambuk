<?php
add_action('init', 'bambuk_cpt_init');

function bambuk_cpt_init()
{
    $careers_post_type_args = [
        'labels' => [
            'name' => 'Vacancy',
            'singular_name' => 'Vacancy',
        ],
        'hierarchical' => false,
        'menu_icon' => 'dashicons-businessperson',
        'menu_position' => 8,
        'public' => true,
        'supports' => ['title', 'editor', 'page-attributes'],
        'show_ui' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'exclude_from_search' => false,
    ];
    register_post_type('careers', $careers_post_type_args);

    $news_post_type_args = [
        'labels' => [
            'name' => 'News & Media',
            'singular_name' => 'Article',
        ],
        'hierarchical' => false,
        'menu_icon' => 'dashicons-images-alt2',
        'menu_position' => 8,
        'public' => true,
        'supports' => ['title', 'editor', 'page-attributes'],
        'show_ui' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'exclude_from_search' => false,
    ];
    register_post_type('news-media', $news_post_type_args);
}

