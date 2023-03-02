<?php
$menu_items = wp_get_nav_menu_items('main');
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <div class="container">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'bambukclassic'); ?></a>

        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">

                <?php if (isset($image) && ! empty($image[0])): ?>
                    <a class="navbar-item" href="/">
                        <img src="<?php echo $image[0]; ?>" alt="" class="top-logo">
                    </a>
                <?php endif; ?>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">

                    <?php
                    if ($menu_items) {
                        foreach ($menu_items as $item) {
                            echo "<a href='$item->url' class='navbar-item'>$item->title</a>";
                        }
                    }
                    ?>
                </div>
            </div>
    </div> <!--.container -->
