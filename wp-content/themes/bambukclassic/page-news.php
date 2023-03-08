<?php
/*
Template Name: News
Template Post Type: page
*/
$post_type = 'news-media';
$news = 'news';
$medias = 'medias';
$per_page = 1;

get_header(); ?>

    <div class="container">
        <div class="main" role="main">

            <h1 class="is-size-2 has-text-centered has-text-weight-bold is-uppercase mb-6">
                <?php the_title(); ?>
            </h1>

            <h3 class="has-text-weight-medium is-size-4 is-uppercase mb-4">
                <?php echo $news; ?>
            </h3>

            <div class="news-list is-flex is-flex-wrap-wrap is-justify-content-flex-start">
                <?php show_three_latest_posts($post_type, $news, $per_page); ?>
            </div>

            <div class="has-text-centered mt-6 mb-6">
                <button id="more-news"
                        data-post='<?php echo $post_type; ?>'
                        data-term='<?php echo $news; ?>'
                        data-page='<?php echo $per_page; ?>'
                        class="button load-more-posts"
                >
                    Load more news
                </button>
            </div>


            <h3 class="has-text-weight-medium is-size-4 is-uppercase mb-4">
                <?php echo $medias; ?>
            </h3>
            <div class="medias-list is-flex is-flex-wrap-wrap is-justify-content-flex-start">
                <?php show_three_latest_posts($post_type, $medias, $per_page); ?>
            </div>


            <div class="has-text-centered mt-6 mb-6">
                <button id="more-medias"
                        data-post='<?php echo $post_type; ?>'
                        data-term='<?php echo $medias; ?>'
                        data-page='<?php echo $per_page; ?>'
                        class="button load-more-posts"
                >
                    Load more medias
                </button>
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
