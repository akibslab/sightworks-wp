<?php

/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sightworks
 */




// header topbar 
$header_right_button_switch = get_theme_mod('header_right_button', false);
$header_right_button_text = get_theme_mod('header_right_button_text', __('Termin vereinbaren', 'sightworks'));
$header_right_button_link = get_theme_mod('header_right_button_link', __('#', 'sightworks'));

?>

<!-- start: Header Area -->
<header class="site-header" id="header">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="site_header_inner">
          <div class="site_logo">
            <?php sightworks_header_logo(); ?>
          </div>
          <div class="site_menu d-none d-md-block">
            <?php sightworks_header_menu(); ?>
          </div>
          <?php if (!empty($header_right_button_switch)) : ?>
            <div class="header_button d-none d-md-block">
              <a class="btn" href="<?php echo esc_url($header_right_button_link); ?>"><?php echo esc_html($header_right_button_text); ?></a>
            </div>
          <?php endif; ?>

          <div class="menu_bars d-md-none">
            <a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/bars.svg" alt="<?php echo esc_attr('bars'); ?>"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Sidemenu Start -->
<div class="side-menu d-md-none">
  <div class="top-area d-flex flex-wrap align-items-center">

    <a href="javascript:void(0)" class="cross-icon-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/close.svg" class="cross" alt="<?php echo esc_attr('Close'); ?>">
    </a>
  </div>

  <div class="mobile-menu">
    <?php sightworks_mobile_menu(); ?>
  </div>

</div>
<!-- Sidemenu End -->
<!-- end: Header Area -->