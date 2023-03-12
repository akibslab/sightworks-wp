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
 * Elementor widget for Projects.
 */
class TJ_ProjectsSlider extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-projects-slider';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('SS Projects-slider', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-slider-album tj-icon';
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
      'project-slider',
      'projects-slider',
      'tj project-slider',
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
      '_tj_projects',
      [
        'label' => esc_html__('Projects', 'tjcore'),
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    $repeater = new Repeater();
    $repeater->add_control(
      'tj_project_title',
      [
        'label' => esc_html__('Project Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Project Title', 'tjcore'),
        'label_block' => true,
      ]
    );
    $repeater->add_control(
      'tj_project_img',
      [
        'label' => esc_html__('Project Image', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],

      ]
    );
    $repeater->add_control(
      'tj_project_url',
      [
        'label' => esc_html__('Project Link', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '',
        'label_block' => true,
      ]
    );

    $this->add_control(
      'tj_project_list',
      [
        'label' => esc_html__('Project List', 'tjcore'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'tj_project_title' => esc_html__('Libri / Weihnachtskampagne', 'tjcore'),
          ],
          [
            'tj_project_title' => esc_html__('Weinetikett', 'tjcore'),
          ],
          [
            'tj_project_title' => esc_html__('Klinik Dr. Guth / Mappe', 'tjcore'),
          ],
          [
            'tj_project_title' => esc_html__('Sheran Gym / Website', 'tjcore'),
          ],
          [
            'tj_project_title' => esc_html__('Mammut Sports Group / Broschüre', 'tjcore'),
          ],
          [
            'tj_project_title' => esc_html__('Bettys Bienen / Packaging', 'tjcore'),
          ],
          [
            'tj_project_title' => esc_html__('SFZ / Branding', 'tjcore'),
          ],
        ],
        'title_field' => '{{{ tj_project_title }}}',
      ]
    );
    $this->end_controls_section();

    // button
    $this->start_controls_section(
      'tj_button',
      [
        'label' => esc_html__('Button', 'tjcore'),
      ]
    );
    $this->add_control(
      'tj_button_show',
      [
        'label' => esc_html__('Show Button', 'tjcore'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'tjcore'),
        'label_off' => esc_html__('Hide', 'tjcore'),
        'return_value' => 'yes',
        'default' => true,
      ]
    );

    $this->add_control(
      'tj_button_text',
      [
        'label' => esc_html__('Button Text', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'tjcore'),
        'title' => esc_html__('Enter button text', 'tjcore'),
        'label_block' => true,
        'condition' => [
          'tj_button_show' => 'yes'
        ],
      ]
    );
    $this->add_control(
      'tj_button_text_mobile',
      [
        'label' => esc_html__('Button Text Mobile', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'tjcore'),
        'title' => esc_html__('Enter button text', 'tjcore'),
        'label_block' => true,
        'condition' => [
          'tj_button_show' => 'yes'
        ],
      ]
    );
    $this->add_control(
      'tj_button_link_type',
      [
        'label' => esc_html__('Button Link Type', 'tjcore'),
        'type' => Controls_Manager::SELECT,
        'options' => [
          '1' => 'Custom Link',
          '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
        'condition' => [
          'tj_button_show' => 'yes'
        ],
      ]
    );
    $this->add_control(
      'tj_button_link',
      [
        'label' => esc_html__('Button link', 'tjcore'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
          'active' => true,
        ],
        'placeholder' => esc_html__('https://your-link.com', 'tjcore'),
        'show_external' => false,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
          'custom_attributes' => '',
        ],
        'condition' => [
          'tj_button_link_type' => '1',
          'tj_button_show' => 'yes'
        ],
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_button_page_link',
      [
        'label' => esc_html__('Select Button Page', 'tjcore'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => tj_get_all_pages(),
        'condition' => [
          'tj_button_link_type' => '2',
          'tj_button_show' => 'yes'
        ]
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
        'selector' => '{{WRAPPER}} .projects-section .section_title h2',
      ]
    );
    $this->add_control(
      'section_title_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .projects-section .section_title h2' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'section_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .projects-section .section_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'project_title',
      [
        'label' => __('Project Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'project_title_typography',
        'selector' => '{{WRAPPER}} .project_inner .project_title h6',
      ]
    );
    $this->add_control(
      'project_title_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .project_inner .project_title h6' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'project_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_inner .project_title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $tj_project_list = $settings['tj_project_list'];
?>


    <!-- start: Projects Section -->
    <script>
      jQuery(document).ready(function($) {
        if ($(".projects_active").length > 0) {
          $(".projects_active").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: "123px",
            autoplay: false,
            autoplaySpeed: 2000,
            speed: 2000,
            dots: false,
            arrows: true,
            prevArrow: $(".Pprev"),
            nextArrow: $(".Pnext"),
            variableWidth: true,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                arrows: false,
                dots: true,
              },
            }, ],
          });
        }
      })
    </script>
    <section class="projects-section">
      <div class="container-fluid gx-0 overflow-hidden">
        <div class="row">
          <div class="col">
            <?php if (!empty($tj_section_title)) : ?>
              <div class="section_title text-center wow fadeInUp" data-wow-delay=".3s">
                <h2><?php echo tj_kses($tj_section_title); ?></h2>
              </div>
            <?php endif;

            if (!empty($tj_project_list)) :
            ?>
              <div class="projects_carousel projects_active">

                <?php foreach ($tj_project_list as $key => $project) : ?>
                  <div class="single_project">

                    <?php if (!empty($project['tj_project_url'])) : ?>
                      <a href="<?php echo esc_url($project['tj_project_url']); ?>" class="project_inner">
                        <div class="project_img">
                          <img src="<?php echo esc_url($project['tj_project_img']['url']); ?>" alt="<?php echo get_post_meta($project['tj_project_img']['id'], '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <div class="project_title d-none d-md-block">
                          <h6><?php echo tj_kses($project['tj_project_title']); ?></h6>
                        </div>
                      </a>
                    <?php else : ?>
                      <div class="project_inner">
                        <div class="project_img">
                          <img src="<?php echo esc_url($project['tj_project_img']['url']); ?>" alt="<?php echo get_post_meta($project['tj_project_img']['id'], '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <div class="project_title d-none d-md-block">
                          <h6><?php echo tj_kses($project['tj_project_title']); ?></h6>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>

              </div>
            <?php endif; ?>

            <div class="projects_navs d-none d-md-flex">
              <button class="Pprev"><i class="fas fa-arrow-left"></i></button>
              <button class="Pnext"><i class="fas fa-arrow-right"></i></button>
            </div>

            <?php if (!empty($settings['tj_button_show'])) :

              // Link
              if ('2' == $settings['tj_button_link_type']) {
                $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_button_page_link']));
                $this->add_render_attribute('tj-button-arg', 'target', '_self');
                $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
              } else {
                if (!empty($settings['tj_button_link']['url'])) {
                  $this->add_link_attributes('tj-button-arg', $settings['tj_button_link']);
                }
              }
            ?>
              <div class="button text-center wow fadeInUp" data-wow-delay=".5s">
                <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn d-none d-md-inline-block"><?php echo $settings['tj_button_text']; ?></a>
                <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn d-md-none"><?php echo $settings['tj_button_text_mobile']; ?></a>
              </div>

            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Projects Section -->

<?php
  }
}

$widgets_manager->register(new TJ_ProjectsSlider());
