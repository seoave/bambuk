<?php get_header(); ?>

    <div class="container">
        <article class="main" role="main">
            <?php
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', get_post_type());
            }
            ?>
        </article>
    </div>

<?php get_footer();