<?php
/*
* Shortcode Bambuk socials
 * use example: ['bambuk_socials']
*/
function show_socials($atts)
{
    $errorMessage = 'ACF Pro is required.';
    $output = '';

    if (! class_exists('ACF')) :
        return $errorMessage;
    endif;

    if (have_rows('socials', 'theme_options')):
        $output = '<div class="social">';
        while (have_rows('socials', 'theme_options')) : the_row();
            $link = get_sub_field('link');
            $icon = get_sub_field('icon');
            $output .= '<a href=' . $link . '><img src=' . $icon . '></a>';
        endwhile;
        $output .= '</div>';
    endif;

    return $output;
}

add_shortcode('bambuk_socials', 'show_socials');
