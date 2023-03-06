<?php
define('THEME_ROOT', get_template_directory());

require_once THEME_ROOT . '/inc/register/post-types.php';
require_once THEME_ROOT . '/inc/register/taxonomies.php';
require_once THEME_ROOT . '/inc/acf-options.php';
require_once THEME_ROOT . '/inc/shortcodes.php';
require_once THEME_ROOT . '/inc/loops.php';

function add_bambuk_theme_scripts_styles()
{
    wp_enqueue_style('base', get_template_directory_uri() . '/assets/css/bulma/bulma.min.css', [], '');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], '');

    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);
    wp_enqueue_script('main');

    $vars = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
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

/*load more*/
add_action('wp_ajax_loadmore', 'loadmore_posts');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_posts');

function loadmore_posts()
{
    $post_type = 'news-media';
    $news = 'news';
    $medias = 'medias';
    $news_terms = get_terms($news);
    $medias_terms = get_terms($medias);
    $news_term_ids = wp_list_pluck($news_terms, 'term_id');
    $medias_term_ids = wp_list_pluck($medias_terms, 'term_id');

    $args = [
        'post_type' => $post_type,
        'orderby' => 'date',
        'posts_per_page' => 3,
        'paged' => $_POST['paged'],
        'tax_query' => [
            [
                'taxonomy' => $news,
                'field' => 'term_id',
                'terms' => $news_term_ids,
            ],
        ],
    ];

    $query = new WP_Query($args);

    $response = '';
    $max_pages = $query->max_num_pages;

    if ($query->have_posts()) :
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            $response = get_template_part('template-parts/content', 'news-item');
        endwhile;
        $content = ob_get_contents();
        ob_end_clean();
    else:
        $content = '';
    endif;

    $output = [
        'max_pages' => $max_pages,
        'content' => $content,
    ];

    echo json_encode($output);
    exit;
}
