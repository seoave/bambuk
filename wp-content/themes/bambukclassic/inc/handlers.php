<?php

/*load more post handler*/
add_action('wp_ajax_loadmore', 'loadmore_posts_handler');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_posts_handler');

function loadmore_posts_handler()
{
    if (
        ! isset($_POST['postType']) ||
        ! isset($_POST['term']) ||
        ! isset($_POST['paged']) ||
        ! isset($_POST['security'])
    ) {
        exit;
    }

    check_ajax_referer('megasecure', 'security');

    $post_type = $_POST['postType'];
    $term = $_POST['term'];
    $per_page = isset($_POST['perPage']) ? $_POST['perPage'] : 3;

    $terms = get_terms($term);
    $term_ids = wp_list_pluck($terms, TERM_ID);

    $args = [
        'post_type' => $post_type,
        'orderby' => 'date',
        'posts_per_page' => $per_page,
        'paged' => $_POST['paged'],
        'tax_query' => [
            [
                'taxonomy' => $term,
                'field' => TERM_ID,
                'terms' => $term_ids,
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

