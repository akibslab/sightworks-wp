<?php

/**
 * sightworks_scripts description
 * @return [type] [description]
 */
function sightworks_scripts() {

    /**
     * all css files
     */

    wp_enqueue_style('sightworks-fonts', sightworks_fonts_url(), [], null);

    if (is_rtl()) {
        wp_enqueue_style('bootstrap-rtl', SIGHTWORKS_THEME_CSS_DIR . 'bootstrap.rtl.min.css', []);
    } else {
        wp_enqueue_style('bootstrap', SIGHTWORKS_THEME_CSS_DIR . 'bootstrap.min.css', []);
    }
    wp_enqueue_style('font-awesome-pro', SIGHTWORKS_THEME_CSS_DIR . 'font-awesome-pro.css', []);
    wp_enqueue_style('animate', SIGHTWORKS_THEME_CSS_DIR . 'animate.css', []);
    wp_enqueue_style('slick', SIGHTWORKS_THEME_CSS_DIR . 'slick.css', []);
    wp_enqueue_style('sightworks-core', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-core.css', []);
    wp_enqueue_style('sightworks-unit', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-unit.css', []);
    wp_enqueue_style('sightworks-responsive', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-responsive.css', []);
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    wp_enqueue_style('sightworks-style', get_stylesheet_uri());

    // all js
    wp_enqueue_script('bootstrap-bundle', SIGHTWORKS_THEME_JS_DIR . 'bootstrap.bundle.min.js', ['jquery'], '', true);
    wp_enqueue_script('waypoints', SIGHTWORKS_THEME_JS_DIR . 'waypoints.js', ['jquery'], false, true);
    wp_enqueue_script('wow', SIGHTWORKS_THEME_JS_DIR . 'wow.js', ['jquery'], false, true);
    wp_enqueue_script('slick', SIGHTWORKS_THEME_JS_DIR . 'slick.min.js', ['jquery'], false, true);
    wp_enqueue_script('vide', SIGHTWORKS_THEME_JS_DIR . 'vide.min.js', ['jquery'], false, true);

    wp_enqueue_script('packery-mode.pkgd', SIGHTWORKS_THEME_JS_DIR . 'packery-mode.pkgd.min.js', ['imagesloaded'], false, true);

    wp_enqueue_script('sightworks-main', SIGHTWORKS_THEME_JS_DIR . 'main.js', ['jquery'], false, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'sightworks_scripts');

/*
Register Fonts
 */
function sightworks_fonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'sightworks')) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Bitter:wght@100;200;300;400;500;600;700;800;900&family=Fira+Code:wght@300;400;500;600;700&display=swap';
    }
    return $font_url;
}
