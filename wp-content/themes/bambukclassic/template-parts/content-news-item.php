<card class="card mr-3 mb-3">

    <div class="entry-content has-text-centered">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
            <?php the_title('<h4 class="is-size-4 has-text-weight-medium">', '</h4>'); ?>
            <p>Created at: <?php the_time('d-m-Y'); ?></p>
        </a>
    </div>
</card>
