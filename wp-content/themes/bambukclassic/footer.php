<?php
$footer_menu_items = wp_get_nav_menu_items('main');
$legal_menu_items = wp_get_nav_menu_items('legal');
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
?>

<footer id="colophon" class="site-footer footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <?php if (isset($image) && ! empty($image[0])): ?>
                    <a class="footer-logo" href="/">
                        <figure class="image is-128x128">
                            <img src="<?php echo $image[0]; ?>" alt="">
                        </figure>
                    </a>

                <?php endif; ?>

                <?php echo do_shortcode('[bambuk_socials]'); ?>

                <?php
                if ($legal_menu_items) {
                    echo '<ul class="legal-menu">';
                    foreach ($legal_menu_items as $item) {
                        echo "<li><a href='$item->url'>$item->title</a></li>";
                    }
                    echo '</ul>';
                }
                ?>
            </div>
            <div class="column">
                <?php
                if ($footer_menu_items) {
                    echo '<ul class="footer-menu">';
                    foreach ($footer_menu_items as $item) {
                        echo "<li><a href='$item->url'>$item->title</a></li>";
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>

        <div class="content">&copy; 2023 Bambuk test</div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
