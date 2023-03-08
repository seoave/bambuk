<?php
define('THEME_ROOT', get_template_directory());

require_once THEME_ROOT . '/inc/register/post-types.php';
require_once THEME_ROOT . '/inc/register/taxonomies.php';
require_once THEME_ROOT . '/inc/acf-options.php';
require_once THEME_ROOT . '/inc/shortcodes.php';
require_once THEME_ROOT . '/inc/loops.php';
require_once THEME_ROOT . '/inc/handlers.php';
require_once THEME_ROOT . '/inc/constants.php';

function add_bambuk_theme_scripts_styles()
{
    wp_enqueue_style('base', get_template_directory_uri() . '/assets/css/bulma/bulma.min.css', [], '');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], '');

    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);
    wp_enqueue_script('main');

    $vars = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('megasecure'),
    );
    wp_localize_script('main', 'ajaxposts', $vars);

    if (is_page_template('page-contacts.php')) {
        $googleMapAPIPath = "https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY";
        wp_register_script('google-map-api', $googleMapAPIPath, [], '', true);
        wp_register_script('acfmap', get_template_directory_uri() . '/assets/js/acfmap.js', ['jquery'], '', true);
        wp_enqueue_script('google-map-api');
        wp_enqueue_script('acfmap');
    }
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

add_action('after_setup_theme', 'setup_bambuk_theme_features', 0);
function setup_bambuk_theme_features()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150);
}
