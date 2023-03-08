<card class="card mr-3 mb-3">

    <div class="entry-content has-text-centered">
        <a href="<?php the_permalink(); ?>">
            <?php the_title('<h4>', '</h4>');
            the_time('d-m-Y', '<p>', '</p>');
            ?>
        </a>
    </div>
</card>
