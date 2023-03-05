<?php get_header(); ?>

<div class="container">
    <div class="main" role="main">
        <div class="posts-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content-none'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
