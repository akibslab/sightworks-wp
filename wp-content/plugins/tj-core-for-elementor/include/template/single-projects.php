<?php

/** 
 * This template for Project Single
 *
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post();


    $desktop_image = function_exists('get_field') ? get_field('desktop_image') : '';
    $mobile_image = function_exists('get_field') ? get_field('mobile_image') : '';

    $project_heading = function_exists('get_field') ? get_field('project_heading') : '';


    $project_content = function_exists('get_field') ? get_field('project_content') : '';
    $content_block_1 = $project_content['content_block_1'];
    $content_block_2 = $project_content['content_block_2'];
    $content_block_3 = $project_content['content_block_3'];

    $content_button = function_exists('get_field') ? get_field('content_button') : '';

    $project_cta = function_exists('get_field') ? get_field('project_cta') : '';
    $cta_button = $project_cta['cta_button'];

    $desktop_gallery = function_exists('get_field') ? get_field('desktop_gallery') : '';
    $mobile_gallery = function_exists('get_field') ? get_field('mobile_gallery') : '';

?>


    <!-- start: Hero Section -->
    <?php if (!empty($mobile_image)) : ?>
      <style>
        @media only screen and (max-width: 767px) {
          .hero-section.mobile_hero-<?php echo get_the_ID(); ?> {
            background-image: url("<?php echo esc_url($mobile_image);  ?>") !important;
          }
        }
      </style>
    <?php endif; ?>
    <section class="hero-section mobile_hero-<?php echo get_the_ID(); ?>" style="background-image: url(<?php echo esc_url($desktop_image); ?>);">
      <!-- mobile bg change -->
      <div class="container">
        <div class="row">
          <div class="col">

          </div>
        </div>
      </div>
    </section>
    <!-- end: Hero Section -->

    <!-- start: Page Heading -->
    <?php if (!empty($project_heading['left_title'] || $project_heading['right_title'])) : ?>
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="page_heading_content">
                <h3 class="left_heading"><?php echo tj_kses($project_heading['left_title']) ?></h3>
                <h4 class="right_heading"><?php echo tj_kses($project_heading['right_title']) ?></h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <!-- end: Page Heading -->

    <!-- start: Details Content -->
    <?php if (!empty($content_block_1) || !empty($content_block_2) || !empty($content_block_3)) : ?>
      <section class="details-content bg-light-dark">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="details_content_group">

                <?php if (!empty($content_block_1['block_title'] || $content_block_1['block_text'])) : ?>
                  <div class="content_text">
                    <h6 class="wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($content_block_1['block_title']); ?></h6>
                    <p class="wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($content_block_1['block_text']) ?></p>
                  </div>
                <?php endif;

                if (!empty($content_block_2['block_title'] || $content_block_2['block_text'])) : ?>
                  <div class="content_text">
                    <h6 class="wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($content_block_2['block_title']); ?></h6>
                    <p class="wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($content_block_2['block_text']); ?></p>
                  </div>
                <?php endif;

                if (!empty($content_block_3['block_title'] || $content_block_3['block_text'])) : ?>
                  <div class="content_text">
                    <h6 class="wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($content_block_3['block_title']); ?></h6>
                    <p class="wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($content_block_3['block_text']); ?></p>
                  </div>
                <?php endif; ?>

              </div>

              <?php if (!empty($content_button['button_text'] || $content_button['button_link'])) : ?>
                <div class="button text-center wow fadeInUp d-none d-md-block" data-wow-delay=".6s">
                  <a href="<?php echo esc_url($content_button['button_link']); ?>" class="btn"><?php echo esc_html($content_button['button_text']); ?></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <!-- end: Details Content -->

    <!-- start: Details Masonry -->
    <?php if (!empty($desktop_gallery)) : ?>
      <section class="masonry-section d-none d-md-block">
        <div class="container-fluid gx-0 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="masonry_content grid">
                <div class="grid-sizer"></div>
                <?php foreach ($desktop_gallery as $key => $item) : ?>
                  <div class="grid-item <?php echo esc_attr($item['image_width']); ?> wow fadeIn" data-wow-delay=".3s">
                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['image']), '_wp_attachment_image_alt', true); ?>">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif;

    if (!empty($mobile_gallery)) :
    ?>
      <section class="masonry-section d-md-none">
        <div class="container-fluid gx-0 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="masonry_content grid">
                <div class="grid-sizer"></div>

                <?php foreach ($mobile_gallery as $key => $image) : ?>
                  <div class="grid-item wow fadeIn" data-wow-delay=".3s">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
        </div>
      </section>
    <?php else : ?>

      <section class="masonry-section d-md-none">
        <div class="container-fluid gx-0 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="masonry_content grid">
                <div class="grid-sizer"></div>
                <?php foreach ($desktop_gallery as $key => $item) : ?>
                  <div class="grid-item wow fadeIn" data-wow-delay=".3s">
                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['image']), '_wp_attachment_image_alt', true); ?>">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>

    <?php endif; ?>
    <!-- end: Details Masonry -->

    <!-- start: CTA Section -->
    <?php if (!empty($project_cta['cta_title'] || $project_cta['cta_title'])) : ?>
      <section class="cta-section details-page bg-light-gray">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="cta_content ">
                <?php if (!empty($project_cta['cta_title'])) : ?>
                  <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($project_cta['cta_title']); ?></h2>
                <?php endif;
                if (!empty($project_cta['cta_text'])) : ?>
                  <p class="text wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($project_cta['cta_text']); ?></p>
                <?php endif; ?>

                <?php if (!empty($cta_button['button_text'] || $cta_button['button_link'])) : ?>
                  <div class="button text-center">
                    <a href="<?php echo esc_url($cta_button['button_link']); ?>" class="btn wow fadeInUp" data-wow-delay=".5s"><?php echo esc_html($cta_button['button_text']); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <!-- end: CTA Section -->

<?php
  endwhile;
  wp_reset_query();
else :
  esc_html_e('No Project Found!', 'tjcore');
endif;
?>

<?php get_footer();  ?>