<?php get_header();?>

<?php get_template_part('parts/page-header'); ?>

<div class="flex-container">
    <div class="main" role="main">
        <div class="posts-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('parts/content'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('parts/content-none'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer();?>
