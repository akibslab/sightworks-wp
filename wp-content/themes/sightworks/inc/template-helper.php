<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sightworks
 */

/**
 * [sightworks_header_lang description]
 * @return [type] [description]
 */
function sightworks_header_lang_default() {
    $sightworks_header_lang = get_theme_mod('header_lang', false);
    if ($sightworks_header_lang) : ?>

        <select>
            <option><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'sightworks'); ?> </a></option>
            <?php do_action('sightworks_language'); ?>
        </select>

    <?php endif; ?>
<?php
}

/**
 * [sightworks_language_list description]
 * @return [type] [description]
 */
function _sightworks_language($mar) {
    return $mar;
}
function sightworks_language_list() {

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');

    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<option>' . esc_html__('Bangla', 'sightworks') . '</option>';
        $mar .= '<option>' . esc_html__('French', 'sightworks') . '</option>';
    }
    print _sightworks_language($mar);
}
add_action('sightworks_language', 'sightworks_language_list');


// Header logo
function sightworks_header_logo() { ?>
    <?php
    // site logo
    $sightworks_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
    $sightworks_site_logo = get_theme_mod('site_logo', $sightworks_logo);
    ?>

    <a class="site__logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url($sightworks_site_logo); ?>" alt="<?php print esc_attr__('logo', 'sightworks'); ?>" />
    </a>
<?php
}

// Header sticky logo
function sightworks_footer_logo() { ?>
    <?php
    $footer_logo = get_template_directory_uri() . '/assets/img/logo/footer-logo.png';
    $sightworks_footer_logo = get_theme_mod('footer_logo', $footer_logo);
    ?>
    <a href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($sightworks_footer_logo); ?>" alt="<?php print esc_attr__('logo', 'sightworks'); ?>" />
    </a>
    <?php
}


/**
 * [sightworks_header_socials description]
 * @return [type] [description]
 */
function sightworks_header_socials() {
    $header_fb_link = get_theme_mod('header_fb_link', __('https://facebook.com/', 'sightworks'));
    $header_ig_link = get_theme_mod('header_ig_link', __('https://instagram.com/', 'sightworks'));
    $header_linkedin_link = get_theme_mod('header_linkedin_link', __('https://linkedin.com/', 'sightworks'));
    $header_twitter_link = get_theme_mod('header_twitter_link', __('https://twitter.com/', 'sightworks'));
    $header_pinterest_link = get_theme_mod('header_pinterest_link', __('https://pinterest.com/', 'sightworks'));
    $header_youtube_link = get_theme_mod('header_youtube_link', __('https://youtube.com/', 'sightworks'));


    if (!empty($header_fb_link)) : ?>
        <a href="<?php echo esc_url($header_fb_link); ?>"><i class="fab fa-facebook-f"></i></a>
    <?php endif;
    if (!empty($header_ig_link)) : ?>
        <a href="<?php echo esc_url($header_ig_link); ?>"><i class="fab fa-instagram"></i></a>
    <?php endif;
    if (!empty($header_linkedin_link)) : ?>
        <a href="<?php echo esc_url($header_linkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a>
    <?php endif;
    if (!empty($header_twitter_link)) : ?>
        <a href="<?php echo esc_url($header_twitter_link); ?>"><i class="fab fa-twitter"></i></a>
    <?php endif;
    if (!empty($header_pinterest_link)) : ?>
        <a href="<?php echo esc_url($header_pinterest_link); ?>"><i class="fab fa-pinterest"></i></a>
    <?php endif;
    if (!empty($header_youtube_link)) : ?>
        <a href="<?php echo esc_url($header_youtube_link); ?>"><i class="fab fa-youtube"></i></a>
    <?php endif;
}

function sightworks_footer_socials() {
    $footer_email_link = get_theme_mod('footer_email_link', __('anfrage@sightworks.de', 'sightworks'));
    $footer_linkedin_link = get_theme_mod('footer_linkedin_link', __('https://www.linkedin.com/in/andrea-lechler-a3a61067/', 'sightworks'));
    $footer_instagram_link = get_theme_mod('footer_instagram_link', __('https://www.instagram.com/sightworks_designstudio/', 'sightworks'));
    $footer_fb_link = get_theme_mod('footer_fb_link', __('https://www.facebook.com/profile.php?id=100089911721876/', 'sightworks'));
    ?>
    <ul class="footer_socials">
        <?php if (!empty($footer_email_link)) : ?>
            <li><a href="mailto:<?php echo esc_url($footer_email_link); ?>"><i class="fas fa-envelope"></i></a></li>
        <?php endif;
        if (!empty($footer_linkedin_link)) : ?>
            <li><a target="_blank" href="<?php echo esc_url($footer_linkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a></li>
        <?php endif;
        if (!empty($footer_instagram_link)) : ?>
            <li><a target="_blank" href="<?php echo esc_url($footer_instagram_link); ?>"><i class="fab fa-instagram"></i></a> </li>
        <?php endif;
        if (!empty($footer_fb_link)) : ?>
            <li><a target="_blank" href="<?php echo esc_url($footer_fb_link); ?>"><i class="fab fa-facebook-f"></i></a></li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [sightworks_header_menu description]
 * @return [type] [description]
 */
function sightworks_header_menu() {

    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Sightworks_Navwalker_Class::fallback',
        'walker'         => new Sightworks_Navwalker_Class,
    ]);
}

/**
 * [sightworks_mobile_menu description]
 * @return [type] [description]
 */
function sightworks_mobile_menu() {

    wp_nav_menu([
        'theme_location' => 'mobile-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Sightworks_Navwalker_Class::fallback',
        'walker'         => new Sightworks_Navwalker_Class,
    ]);
}

/**
 * [sightworks_footer_menu description]
 * @return [type] [description]
 */
function sightworks_footer_menu() {
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'footer_menu',
        'container'      => '',
        'fallback_cb'    => 'Sightworks_Navwalker_Class::fallback',
        'walker'         => new Sightworks_Navwalker_Class,
    ]);
}
// sightworks_copyright_text
function sightworks_copyright_text() {
    print get_theme_mod('sightworks_copyright', sightworks_kses('© 2022 Sightworks, All Rights Reserved. Design By <a href="#">SecureSofts</a>'));
}


/**
 *
 * pagination
 */
if (!function_exists('sightworks_pagination')) {

    function _sightworks_pagi_callback($pagination) {
        return $pagination;
    }

    //page navigation
    function sightworks_pagination($prev, $next, $pages, $args) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _sightworks_pagi_callback($pagi);
    }
}


// header top bg color
function sightworks_breadcrumb_bg_color() {
    $color_code = get_theme_mod('sightworks_breadcrumb_bg_color', '#222');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('sightworks-breadcrumb-bg', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_breadcrumb_bg_color');

// breadcrumb-spacing top
function sightworks_breadcrumb_spacing() {
    $padding_px = get_theme_mod('sightworks_breadcrumb_spacing', '160px');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('sightworks-breadcrumb-top-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_breadcrumb_spacing');

// breadcrumb-spacing bottom
function sightworks_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod('sightworks_breadcrumb_bottom_spacing', '160px');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('sightworks-breadcrumb-bottom-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_breadcrumb_bottom_spacing');

// scrollUp
function sightworks_scrollup_switch() {
    $scrollup_switch = get_theme_mod('sightworks_scrollup_switch', false);
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('sightworks-scrollup-switch', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_scrollup_switch');

// theme custom color
function sightworks_custom_color() {
    $color_code = get_theme_mod('sightworks_color_option', '#2b4eff');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        $custom_css .= ".demo-class { border-left-color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style('sightworks-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_custom_color');


// theme primary color
function sightworks_custom_color_primary() {
    $color_code = get_theme_mod('sightworks_color_option_2', '#f2277e');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-left-color: " . $color_code . "}";
        wp_add_inline_style('sightworks-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_custom_color_primary');

// theme scrollUp color
function sightworks_custom_color_scrollup() {
    $color_code = get_theme_mod('sightworks_color_scrollup', '#2b4eff');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        wp_add_inline_style('sightworks-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_custom_color_scrollup');

// theme secondary color
function sightworks_custom_color_secondary() {
    $color_code = get_theme_mod('sightworks_color_option_3', '#30a820');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".asdf { border-color: " . $color_code . "}";
        wp_add_inline_style('sightworks-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_custom_color_secondary');

// theme secondary 2 color
function sightworks_custom_color_secondary_2() {
    $color_code = get_theme_mod('sightworks_color_option_3_2', '#ffb352');
    wp_enqueue_style('sightworks-custom', SIGHTWORKS_THEME_CSS_DIR . 'sightworks-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style('sightworks-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sightworks_custom_color_secondary_2');


// sightworks_kses_intermediate
function sightworks_kses_intermediate($string = '') {
    return wp_kses($string, sightworks_get_allowed_html_tags('intermediate'));
}

function sightworks_get_allowed_html_tags($level = 'basic') {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function sightworks_kses($raw) {

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}



// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function tp_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'tp_mime_types');
