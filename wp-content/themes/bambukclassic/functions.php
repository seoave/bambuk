<?php

function add_bambuk_theme_scripts_styles()
{
    wp_enqueue_style('base', get_template_directory_uri() . '/assets/css/bulma/bulma.min.css', [], '');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], '');

    //wp_enqueue_style('slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all');

    //wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), 1.1, true);
}

add_action('wp_enqueue_scripts', 'add_bambuk_theme_scripts_styles');

if (! function_exists('bambuk_theme_register_nav_menu')) {
    function bambuk_theme_register_nav_menu()
    {
        register_nav_menus(array(
            'primary_menu' => __('Primary Menu', 'bambukclassic'),
            'footer_menu' => __('Footer Menu', 'bambukclassic'),
            'legal_menu' => __('Legal Menu', 'bambukclassic'),
        ));
    }

    add_action('after_setup_theme', 'bambuk_theme_register_nav_menu', 0);
}

add_theme_support('custom-logo');

function bambuk_theme_custom_logo_setup()
{
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => ['site-title', 'site-description'],
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'bambuk_theme_custom_logo_setup');
