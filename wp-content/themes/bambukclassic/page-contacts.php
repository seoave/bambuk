<?php
/*
Template Name: Contacts
Template Post Type: page
*/

get_header(); ?>

    <div class="container">
        <div class="main" role="main">
            <div class="posts-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php
                                the_content();

                                if (have_rows('adresses', 'theme_options')):
                                    while (have_rows('adresses', 'theme_options')) : the_row();
                                        $location = get_sub_field('map');
                                        ?>
                                        <h4 class="is-size-2 is-bold"><?php the_sub_field('country') ?></h4>
                                        <p><?php the_sub_field('street') ?></p>
                                        <p><?php the_sub_field('city') ?></p>
                                        <p><?php the_sub_field('country') ?></p>
                                        <p><?php the_sub_field('email') ?></p>

                                        <?php $phones = get_sub_field('phones');
                                        if (have_rows('phones')):
                                            while (have_rows('phones')) : the_row();
                                                $phone = get_sub_field('phone');
                                                echo "<p>$phone</p>";
                                            endwhile;
                                        endif;
                                        ?>

                                        <?php if ($location): ?>
                                            <div class="acf-map" data-zoom="16">
                                                <p>Map will be here</p>
                                                <div class="marker"
                                                     data-lat="<?php echo esc_attr($location['lat']); ?>"
                                                     data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile;
                                endif; ?>

                                <?php echo do_shortcode('[bambuk_socials]'); ?>

                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer();
