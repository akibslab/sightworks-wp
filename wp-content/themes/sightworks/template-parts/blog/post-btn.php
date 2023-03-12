<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sightworks
 */

$sightworks_blog_btn = get_theme_mod('sightworks_blog_btn', 'Read More');
$sightworks_blog_btn_switch = get_theme_mod('sightworks_blog_btn_switch', true);

?>

<?php if (!empty($sightworks_blog_btn_switch)) : ?>
    <div class="ss-post__btn">
        <a href="<?php the_permalink(); ?>" class="ss-btn"><?php print esc_html($sightworks_blog_btn); ?></a>
    </div>
<?php endif; ?>