<?php
/*
Template Name: Careers
Template Post Type: page
*/
$post_type = 'careers';
get_header(); ?>

    <div class="container">
        <div class="main" role="main">

            <?php the_title('<h1 class="is-size-2 has-text-centered has-text-weight-bold is-uppercase mb-6">', '</h1>'); ?>

            <div class="vacancies-list is-flex is-flex-wrap-wrap is-justify-content-flex-start">

                <?php
                $args = array(
                    'post_type' => $post_type,
                    'orderby' => 'date',
                    //  'paged' => $paged,
                );

                $posts_query = new WP_Query($args);

                if ($posts_query->have_posts()) :
                    while ($posts_query->have_posts()) :
                        $posts_query->the_post();
                        get_template_part('template-parts/content', 'careers-item');
                    endwhile;
                endif;

                wp_reset_postdata(); ?>

            </div>

            <div class="content">
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
