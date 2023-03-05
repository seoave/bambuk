<?php
/*
Template Name: Contacts
Template Post Type: page
*/
$adresses = get_field('adresses', 'theme_options');

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
                                if (! empty($adresses)):
                                    foreach ($adresses as $adress) :
                                        echo '<h4 class="is-size-2 is-bold">' . $adress['country'] . '</h4>';
                                        foreach ($adress as $item) :
                                            if (! empty($item) && is_array($item)):
                                                echo "<ul>";
                                                foreach ($item as $subItem) :
                                                    echo '<li>' . $subItem['phone'] . '</li>';
                                                endforeach;
                                                echo '</ul>';
                                            else:
                                                echo "<p>$item</p>";
                                            endif;
                                        endforeach;
                                    endforeach;
                                endif;

                                if (have_rows('adresses', 'theme_options')):
                                    while (have_rows('adresses', 'theme_options')) : the_row();
                                        $location = get_sub_field('map');
                                        ?>
                                        <h4 class="is-size-2 is-bold"><?php the_sub_field('country') ?></h4>
                                        <p><?php the_sub_field('street') ?></p>
                                        <p><?php the_sub_field('city') ?></p>
                                        <p><?php the_sub_field('country') ?></p>
                                        <p><?php the_sub_field('email') ?></p>
                                        <?php if ($location): ?>
                                            <div class="acf-map" data-zoom="16">
                                                <div class="marker"
                                                     data-lat="<?php echo esc_attr($location['lat']); ?>"
                                                     data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile;
                                endif; ?>

                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer();
