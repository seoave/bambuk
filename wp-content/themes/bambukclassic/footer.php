<?php
$footer_menu_items = wp_get_nav_menu_items('main');
$legal_menu_items = wp_get_nav_menu_items('legal');
?>

<footer id="colophon" class="site-footer footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <a href="/" class="button">Home</a>
                <a href="/" class="button">Socials</a>

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
