<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sightworks
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class('ss-post__grid no-results'); ?>>
    <div class="ss-page__header d-none">
        <h1 class="page__title"><?php esc_html_e('Nothing Found', 'sightworks'); ?></h1>
    </div>

    <div class="ss-post__wrapper">
        <div class="ss-post-content__wrapper">
            <?php
            if (is_home() && current_user_can('publish_posts')) :

                printf(
                    '<p>' . wp_kses(
                        /* translators: 1: link to WP admin new post page. */
                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sightworks'),
                        [
                            'a' => [
                                'href' => [],
                            ],
                        ]
                    ) . '</p>',
                    esc_url(admin_url('post-new.php'))
                );

            elseif (is_search()) :
            ?>

                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sightworks'); ?></p>
            <?php
                get_search_form();
            else :
            ?>

                <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sightworks'); ?></p>
            <?php
                get_search_form();

            endif;
            ?>
        </div>
    </div><!-- .page-content -->
</section><!-- .no-results -->