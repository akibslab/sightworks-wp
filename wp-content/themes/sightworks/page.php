<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sightworks
 */

get_header();
?>

<div class="ss-page__area">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="ss-page__content">
          <?php
          if (have_posts()) :

            if (apply_filters('sightworks_page_title', true)) : ?>
              <header class="ss-page__header">
                <?php
                single_post_title('<h1 class="entry-title ss-page__title">', '</h1>');
                ?>
              </header><!-- .page-header -->
          <?php
            endif; // .hide-title


            while (have_posts()) : the_post();
              get_template_part('template-parts/content', 'page');
            endwhile;
          else :
            get_template_part('template-parts/content', 'none');
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
