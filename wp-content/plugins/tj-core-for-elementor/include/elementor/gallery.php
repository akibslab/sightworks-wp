<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * SS Core
 *
 * Elementor widget for Gallery.
 */
class TJ_Gallery extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-gallery';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('SS Gallery', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-gallery-grid tj-icon';
  }

  /**
   * Widget categories.
   */
  public function get_categories() {
    return ['tjcore'];
  }

  /**
   * Widget scripts dependencies.
   */
  public function get_script_depends() {
    return ['tjcore'];
  }

  /**
   * Widget keywords.
   */
  public function get_keywords() {
    return [
      'gallery',
      'galleries',
      'tj gallery',
      'tj',
      'tj addons',
      'tjcore',
    ];
  }

  /**
   * Widget custom url.
   */
  public function get_custom_help_url() {
    return 'https://go.elementor.com/';
  }

  /**
   * Register the widget controls.
   *
   */
  protected function register_controls() {

    // gallery items
    $this->start_controls_section(
      'tj_galleries',
      [
        'label' => esc_html__('Galleries', 'tjcore'),
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    $this->add_control(
      'gallery_images',
      [
        'label' => esc_html__('Gallery Images', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'image',
            'label' => esc_html__('Image', 'tjcore'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
              'url' => Utils::get_placeholder_image_src(),
            ],
          ],
          [
            'name' => 'hover_text',
            'label' => esc_html__('Hover Text', 'tjcore'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Hover Text', 'tjcore'),
            'label_block' => true,
          ],
          [
            'name' => 'show_link',
            'label' => esc_html__('Show Link', 'tjcore'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Show', 'tjcore'),
            'label_off' => esc_html__('Hide', 'tjcore'),
            'return_value' => 'yes',
            'default' => 'no',
          ],
          [
            'name' => 'gallery_link',
            'label' => esc_html__('Link', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('', 'tjcore'),
            'title' => esc_html__('Enter button text', 'tjcore'),
            'label_block' => true,
            'condition' => [
              'show_link' => 'yes'
            ],
          ],
        ],
        'default' => [
          [
            'hover_text' => esc_html__('Title #1', 'tjcore'),
          ],
          [
            'hover_text' => esc_html__('Title #2', 'tjcore'),
          ],
        ],
        'title_field' => '{{{ hover_text }}}',
      ]
    );
    $this->end_controls_section();




    // TAB_STYLE
    $this->start_controls_section(
      'section_title',
      [
        'label' => __('Section Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'hover_color',
      [
        'label' => esc_html__('Hover Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .galleries .gallery_img:after' => 'background-color: {{VALUE}}',
        ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'hover_text_typography',
        'selector' => '{{WRAPPER}} .galleries .gallery_img .hover_text span',
        'separator' => 'after'
      ]
    );
    $this->add_control(
      'hover_text_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .galleries .gallery_img .hover_text span' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'hover_text_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .galleries .gallery_img .hover_text span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();
  }

  /**
   * Render the widget output on the frontend.
   *
   */
  protected function render() {
    $settings = $this->get_settings_for_display();

    $gallery_images = $settings['gallery_images'];
?>


    <!-- start: Gallery Section -->
    <section class="gallery-section d-none d-md-block">
      <div class="container-fluid gx-0 overflow-hidden">
        <div class="row">
          <div class="col">

            <?php if (!empty($gallery_images)) : ?>
              <div class="galleries">

                <?php foreach ($gallery_images as $key => $image) :

                  if ('yes' == $image['show_link']) : ?>

                    <a class="gallery_img wow fadeIn" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s" href="<?php echo esc_url($image['gallery_link']); ?>">
                      <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo get_post_meta($image['image']['id'], '_wp_attachment_image_alt', true); ?>">

                      <?php if (!empty($image['hover_text'])) : ?>
                        <div class="hover_text">
                          <span><?php echo tj_kses($image['hover_text']); ?></span>
                        </div>
                      <?php endif; ?>

                    </a>

                  <?php else : ?>
                    <div class="gallery_img wow fadeIn" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                      <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo get_post_meta($image['image']['id'], '_wp_attachment_image_alt', true); ?>">

                      <?php if (!empty($image['hover_text'])) : ?>
                        <div class="hover_text">
                          <span><?php echo tj_kses($image['hover_text']); ?></span>
                        </div>
                      <?php endif; ?>

                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>

              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>
    <!-- end: Gallery Section -->
<?php
  }
}

$widgets_manager->register(new TJ_Gallery());
