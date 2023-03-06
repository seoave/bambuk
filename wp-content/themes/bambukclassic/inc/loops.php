<?php
function show_three_latest_posts(string $post_type, string $taxonomy)
{
    $terms = get_terms($taxonomy);
    $term_id = 'term_id';
    $term_ids = wp_list_pluck($terms, $term_id);

    $args = [
        'post_type' => $post_type,
        'orderby' => 'date',
        'posts_per_page' => 3,
        'paged' => 1,
        'tax_query' => [
            [
                'taxonomy' => $taxonomy,
                'field' => $term_id,
                'terms' => $term_ids,
            ],
        ],
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/content', 'news-item');
        endwhile;
    endif;

    wp_reset_postdata();
}
