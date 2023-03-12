<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor widget for Branding.
 */
class TJ_Branding extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-branding';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('SS Branding', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   */
  public function get_icon() {
    return 'eicon-t-letter-bold tj-icon';
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
      'branding',
      'brandings',
      'tj branding',
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

    // tj_section_title
    $this->start_controls_section(
      'tj_section_title',
      [
        'label' => esc_html__('Title & Content', 'tjcore'),
      ]
    );
    $this->add_control(
      'tj_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('SS Title Here', 'tjcore'),
        'placeholder' => esc_html__('Type Heading Text', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_title_tag',
      [
        'label' => esc_html__('Title HTML Tag', 'tjcore'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'h1' => [
            'title' => esc_html__('H1', 'tjcore'),
            'icon' => 'eicon-editor-h1'
          ],
          'h2' => [
            'title' => esc_html__('H2', 'tjcore'),
            'icon' => 'eicon-editor-h2'
          ],
          'h3' => [
            'title' => esc_html__('H3', 'tjcore'),
            'icon' => 'eicon-editor-h3'
          ],
          'h4' => [
            'title' => esc_html__('H4', 'tjcore'),
            'icon' => 'eicon-editor-h4'
          ],
          'h5' => [
            'title' => esc_html__('H5', 'tjcore'),
            'icon' => 'eicon-editor-h5'
          ],
          'h6' => [
            'title' => esc_html__('H6', 'tjcore'),
            'icon' => 'eicon-editor-h6'
          ]
        ],
        'default' => 'h2',
        'toggle' => false,
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'section_style',
      [
        'label' => __('Style', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .branding-section .section_title h2',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .branding-section .section_title h2' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .branding-section .section_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();
  }

  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();



    $this->add_render_attribute('title_args', 'class', 'title');
?>

    <!-- start: Brading Section -->
    <?php if (!empty($settings['tj_title'])) : ?>
      <section class="branding-section">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title wow fadeInUp" data-wow-delay=".3s">
                <?php printf(
                  '<%1$s %2$s>%3$s</%1$s>',
                  tag_escape($settings['tj_title_tag']),
                  $this->get_render_attribute_string('title_args'),
                  tj_kses($settings['tj_title'])
                ); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <!-- end: Brading Section -->

<?php
  }
}

$widgets_manager->register(new TJ_Branding());
