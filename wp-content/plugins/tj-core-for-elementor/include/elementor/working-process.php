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
 * Elementor widget for TJ_WorkingProcess.
 */
class TJ_WorkingProcess extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-working';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('SS Working', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-theme-builder tj-icon';
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
      'working',
      'working process',
      'tj working',
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

    // section title
    $this->start_controls_section(
      '_tj_section_title',
      [
        'label' => esc_html__('Section Title', 'tjcore'),
      ]
    );
    $this->add_control(
      'tj_section_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Section Title', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->end_controls_section();

    // Service List
    $this->start_controls_section(
      'tj_content',
      [
        'label' => esc_html__('Content', 'tjcore'),
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    $this->add_control(
      'process_list',
      [
        'label' => esc_html__('Process List', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'tj_process_title',
            'label' => esc_html__('Process Title', 'tjcore'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Process Title', 'tjcore'),
            'label_block' => true,
          ],
          [
            'name' => 'Key_points',
            'label' => __('Key Points', 'elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => [
              [
                'name' => 'point',
                'label' => __('Pint', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
              ],
            ],
            'default' => [
              [
                'point' => __('Point 1', 'elementor'),
              ],
              [
                'point' => __('Point 2', 'elementor'),
              ],
            ],
          ],
        ],
        'default' => [
          [
            'tj_process_title' => esc_html__('Kennenlern-Call', 'tjcore'),
          ],
          [
            'tj_process_title' => esc_html__('Interview Phase', 'tjcore'),
          ],
          [
            'tj_process_title' => esc_html__('Auswertung', 'tjcore'),
          ],
          [
            'tj_process_title' => esc_html__('Los gehts', 'tjcore'),
          ],
          [
            'tj_process_title' => esc_html__('Ausarbeitung', 'tjcore'),
          ],
          [
            'tj_process_title' => esc_html__('Finalisierung', 'tjcore'),
          ],
        ],
        'title_field' => '{{{ tj_process_title }}}',
      ]
    );

    $this->add_control(
      'tj_divider_text',
      [
        'label' => esc_html__('Divider Text', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Garantieversprechen', 'tjcore'),
        'label_block' => true,
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
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'section_title_typography',
        'selector' => '{{WRAPPER}} .faq_content .title',
      ]
    );
    $this->add_control(
      'section_title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .faq_content .title' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'section_title_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .faq_content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'faq_title',
      [
        'label' => __('FAQ Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'faq_title_typography',
        'selector' => '{{WRAPPER}} .faq_accordion .accordion_item .accordion_title',
      ]
    );
    $this->add_control(
      'faq_title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .faq_accordion .accordion_item .accordion_title' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'faq_title_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .faq_accordion .accordion_item .accordion_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'faq_desc',
      [
        'label' => __('FAQ Description', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'faq_desc_typography',
        'selector' => '{{WRAPPER}} .faq_accordion .accordion_item .accordion_text p, .faq_accordion .accordion_item .accordion_text li',
      ]
    );
    $this->add_control(
      'faq_desc_color',
      [
        'label' => esc_html__('Text Color', 'tjcore'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .faq_accordion .accordion_item .accordion_text p, .faq_accordion .accordion_item .accordion_text li' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'faq_desc_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .faq_accordion .accordion_item .accordion_text p, .faq_accordion .accordion_item .accordion_text li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $tj_section_title = $settings['tj_section_title'];
    $tj_divider_text = $settings['tj_divider_text'];

    $process_list = $settings['process_list'];

?>


    <!-- start: Working Process -->
    <section class="working-process">
      <div class="container-fluid gx-0 gx-md-4 overflow-hidden">
        <div class="row">
          <div class="col">
            <?php if (!empty($tj_section_title)) : ?>
              <div class="section_title text-center d-md-none">
                <h2><?php echo tj_kses($tj_section_title); ?></h2>
              </div>
            <?php endif;

            if (!empty($process_list)) :
            ?>
              <div class="working_process_content d-none d-md-flex">

                <?php foreach ($process_list as $key => $process) : ?>

                  <?php if ('2' == $key) : ?>
                    <div class="process_card wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                      <div class="inner_card">
                        <div class="card_no"><?php esc_html_e($key + 1, 'tjcore'); ?></div>
                        <div class="card_content">
                          <span class="title"><?php echo tj_kses($process['tj_process_title']); ?></span>

                          <?php if (!empty($process['Key_points'])) : ?>
                            <ul>
                              <?php foreach ($process['Key_points'] as $point) : ?>
                                <li><?php echo tj_kses($point['point']); ?></li>
                              <?php endforeach; ?>
                            </ul>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="divider wow fadeInUp d-none d-md-block" data-wow-delay=".3s">
                      <span><?php echo tj_kses($tj_divider_text); ?></span>
                    </div>

                  <?php else : ?>
                    <div class="process_card wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                      <div class="inner_card">
                        <div class="card_no"><?php esc_html_e($key + 1, 'tjcore'); ?></div>
                        <div class="card_content">
                          <span class="title"><?php echo tj_kses($process['tj_process_title']); ?></span>

                          <?php if (!empty($process['Key_points'])) : ?>
                            <ul>
                              <?php foreach ($process['Key_points'] as $point) : ?>
                                <li><?php echo tj_kses($point['point']); ?></li>
                              <?php endforeach; ?>
                            </ul>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach ?>

              </div>
            <?php endif; ?>


            <?php if (!empty($process_list)) : ?>

              <script>
                jQuery(document).ready(function($) {
                  if ($(".working-process-active").length > 0) {
                    $(".working-process-active").slick({
                      infinite: true,
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      centerMode: true,
                      autoplay: false,
                      autoplaySpeed: 2000,
                      speed: 2000,
                      dots: false,
                      arrows: false,
                      dots: true,
                      variableWidth: true,
                    });
                  }
                })
              </script>
              <div class="working_process_content working-process-active d-md-none">

                <?php foreach ($process_list as $key => $process) : ?>
                  <div class="process_card wow fadeInUp" data-wow-delay=".3s">
                    <div class="inner_card">
                      <div class="card_no"><?php esc_html_e($key + 1, 'tjcore'); ?></div>
                      <div class="card_content">
                        <span class="title"><?php echo tj_kses($process['tj_process_title']); ?></span>
                        <?php if (!empty($process['Key_points'])) : ?>
                          <ul>
                            <?php foreach ($process['Key_points'] as $point) : ?>
                              <li><?php echo tj_kses($point['point']); ?></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>

              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>
    <!-- end: Working Process -->



<?php
  }
}

$widgets_manager->register(new TJ_WorkingProcess());
