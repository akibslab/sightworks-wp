<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */
$footer_info = get_theme_mod('footer_info', __('Studio für Design Andrea Lechler', 'sightworks'));
$footer_address = get_theme_mod('footer_address', __('22607 Hamburg Deutschland', 'sightworks'));
$footer_phone = get_theme_mod('footer_phone', __('+49 (0) 40 4145 6068', 'sightworks'));
$footer_agbs_link = get_theme_mod('footer_agbs_link', '');

$footer_social_switcher = get_theme_mod('footer_social_switcher', true);
?>


<!-- start: Footer Area -->
<footer class="site-footer">
  <div class="container">
    <div class="col">
      <div class="footer_widgets">
        <div class="footer_widget about_widgets">
          <?php  ?>
          <div class="footer_logo">
            <?php sightworks_footer_logo(); ?>
          </div>
          <div class="footer_content">
            <?php if (!empty($footer_info)) : ?>
              <span class="info"><?php echo $footer_info; ?></span>
            <?php endif;
            if (!empty($footer_address)) : ?>
              <span class="address"><?php echo $footer_address; ?></span>
            <?php endif;
            if (!empty($footer_phone)) : ?>
              <a href="tel:<?php echo $footer_phone; ?>" class="phone"><?php echo $footer_phone; ?></a>
            <?php endif;

            if ($footer_agbs_link) :
            ?>
              <ul class="footer_menu d-md-none">
                <li><a href="<?php echo esc_url($footer_agbs_link); ?>"><?php echo sightworks_kses('Impressum <br> Datenschutz
                    AGBs'); ?></a></li>
              </ul>
            <?php endif; ?>

            <?php if (!empty($footer_social_switcher)) :  ?>
              <?php sightworks_footer_socials(); ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="footer_widget d-none d-md-block">
          <div class="footer_content">
            <?php sightworks_footer_menu(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- end: Footer Area -->