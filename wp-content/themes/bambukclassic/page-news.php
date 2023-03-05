<?php
/*
Template Name: News
Template Post Type: page
*/
$post_type = 'news-media';
$news = 'news';
$medias = 'medias';
$news_terms = get_terms($news);
$medias_terms = get_terms($medias);
$news_term_ids = wp_list_pluck($news_terms, 'term_id');
$medias_term_ids = wp_list_pluck($medias_terms, 'term_id');
get_header(); ?>

    <div class="container">
        <div class="main" role="main">

            <?php the_title('<h1 class="is-size-2 has-text-centered has-text-weight-bold is-uppercase mb-6">', '</h1>'); ?>

            <h3 class="has-text-weight-medium is-size-4 is-uppercase mb-4"><?php echo $news; ?></h3>
            <div class="news-list is-flex is-flex-wrap-wrap is-justify-content-flex-start">

                <?php
                $args = [
                    'post_type' => $post_type,
                    'orderby' => 'date',
                    //  'paged' => $paged,
                    'tax_query' => [
                        [
                            'taxonomy' => $news,
                            'field' => 'term_id',
                            'terms' => $news_term_ids,
                        ],
                    ],
                ];

                $posts_query = new WP_Query($args);

                if ($posts_query->have_posts()) :
                    while ($posts_query->have_posts()) :
                        $posts_query->the_post();
                        get_template_part('template-parts/content', 'news-item');
                    endwhile;
                else:
                    get_template_part('template-parts/content', 'none');
                endif;

                wp_reset_postdata(); ?>

            </div>

            <div class="has-text-centered">
                <button id="more-news" class="button">Load more news</button>
            </div>


            <h3 class="has-text-weight-medium is-size-4 is-uppercase mb-4"><?php echo $medias; ?></h3>
            <div class="medias-list is-flex is-flex-wrap-wrap is-justify-content-flex-start">

                <?php
                $args = array(
                    'post_type' => $post_type,
                    'orderby' => 'date',
                    //  'paged' => $paged,
                    'tax_query' => [
                        [
                            'taxonomy' => $medias,
                            'field' => 'term_id',
                            'terms' => $medias_term_ids,
                        ],
                    ],
                );

                $posts_query = new WP_Query($args);

                if ($posts_query->have_posts()) :
                    while ($posts_query->have_posts()) :
                        $posts_query->the_post();
                        get_template_part('template-parts/content', 'news-item');
                    endwhile;
                else:
                    get_template_part('template-parts/content', 'none');
                endif;

                wp_reset_postdata(); ?>

            </div>

            <div class="has-text-centered">
                <button id="more-medias" class="button">Load more medias</button>
            </div>


            <div class="content mt-6">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php
                                the_content();
                                ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer();
