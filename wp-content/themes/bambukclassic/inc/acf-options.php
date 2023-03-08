<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => false,
        'post_id' => 'theme_options',
        'updated_message' => __("Options Updated", 'acf'),
    ]);
}
