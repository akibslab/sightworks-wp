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
 * Elementor widget for why me.
 */
class TJ_WhyMe extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-why-me';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('SS Why-me', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-posts-grid tj-icon';
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
      'why-me',
      'about-me',
      'tj why-me',
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

    // layout Panel
    $this->start_controls_section(
      'tj_layout',
      [
        'label' => esc_html__('Design Layout', 'tjcore'),
      ]
    );
    $this->add_control(
      'tj_design_style',
      [
        'label' => esc_html__('Select Layout', 'tjcore'),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'layout-1' => esc_html__('Layout 1', 'tjcore'),
          'layout-2' => esc_html__('Layout 2', 'tjcore'),
        ],
        'default' => 'layout-1',
      ]
    );
    $this->end_controls_section();

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
    $this->add_control(
      'tj_section_subtitle',
      [
        'label' => esc_html__('Sub Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Section Sub Title', 'tjcore'),
        'label_block' => true,
        'condition' => [
          'tj_design_style' => 'layout-2'
        ]
      ]
    );
    $this->add_control(
      'tj_section_title_mobile',
      [
        'label' => esc_html__('Mobile Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Section Mobile Title', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_why-me-image',
      [
        'label' => esc_html__('Image', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],

      ]
    );
    $this->end_controls_section();

    // Service List
    $this->start_controls_section(
      'tj_why-me',
      [
        'label' => esc_html__('Why-me Items', 'tjcore'),
        'description' => esc_html__('Control all the style settings from Style tab', 'tjcore'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
      'tj_whyme_icon',
      [
        'label' => esc_html__('Upload Icon Image', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],

      ]
    );
    $repeater->add_control(
      'tj_whyme_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Service Title', 'tjcore'),
        'label_block' => true,
      ]
    );
    $repeater->add_control(
      'tj_whyme_description',
      [
        'label' => esc_html__('Description', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
        'label_block' => true,
      ]
    );
    $repeater->add_control(
      'tj_whyme_subtitle',
      [
        'label' => esc_html__('Subtitle', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
        'label_block' => true,
      ]
    );

    $this->add_control(
      'tj_whyme_list',
      [
        'label' => esc_html__('Item List', 'tjcore'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'tj_whyme_title' => esc_html__('Strukturiert', 'tjcore'),
          ],
          [
            'tj_whyme_title' => esc_html__('Ausdrucksstark', 'tjcore'),
          ],
          [
            'tj_whyme_title' => esc_html__('Stimmig', 'tjcore'),
          ],
        ],
        'title_field' => '{{{ tj_whyme_title }}}',
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      '_bottom_content',
      [
        'label' => esc_html__('Bottom Content', 'tjcore'),
        'condition' => [
          'tj_design_style' => 'layout-2'
        ]
      ]
    );
    $this->add_control(
      'tj_bottom_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('bottom Title', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_bottom_content',
      [
        'label' => esc_html__('Content', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Bottom Content', 'tjcore'),
        'rows' => 10,
        'label_block' => true,
      ]
    );
    $this->end_controls_section();


    // service button
    $this->start_controls_section(
      'tj_button',
      [
        'label' => esc_html__('Button', 'tjcore'),
        'condition' => [
          'tj_design_style!' => 'layout-2'
        ]
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
        'label' => esc_html__('Desktop Btn Text', 'tjcore'),
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
        'label' => esc_html__('Mobile Btn Text', 'tjcore'),
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
        'selector' => '{{WRAPPER}} .why_me_content .section_title > h2, .team-content .section_title h2',
      ]
    );
    $this->add_control(
      'section_title_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .why_me_content .section_title > h2, .team-content .section_title h2' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .why_me_content .section_title > h2, .team-content .section_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'section_subtitle',
      [
        'label' => __('Section Sub Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
          'tj_design_style' => 'layout-2'
        ]
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'section_subtitle_typography',
        'selector' => '{{WRAPPER}} .team-content .section_title h3',
      ]
    );
    $this->add_control(
      'section_subtitle_color',
      [
        'label' => esc_html__('Subtitle Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team-content .section_title h3' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'section_subtitle_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .team-content .section_title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'service_title',
      [
        'label' => __('Item Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'service_title_typography',
        'selector' => '{{WRAPPER}} .why_me_service_inner .content h5',
      ]
    );
    $this->add_control(
      'service_title_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .why_me_service_inner .content h5' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'service_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .why_me_service_inner .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'service_desc',
      [
        'label' => __('Item Description', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'service_desc_typography',
        'selector' => '{{WRAPPER}} .why_me_service_inner .content p',
      ]
    );
    $this->add_control(
      'service_desc_color',
      [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .why_me_service_inner .content p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'service_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .why_me_service_inner .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'service_subtitle',
      [
        'label' => __('Item Subtitle', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'service_sub_typography',
        'selector' => '{{WRAPPER}} .why_me_service_inner .content p.bottom',
      ]
    );
    $this->add_control(
      'service_sub_color',
      [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .why_me_service_inner .content p.bottom' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'service_sub_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .why_me_service_inner .content p.bottom' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'section_bottom_title',
      [
        'label' => __('Bottom section', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
          'tj_design_style' => 'layout-2'
        ]
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'section_bottom_title_typography',
        'selector' => '{{WRAPPER}} .team-bottom-content .section_title h4',
      ]
    );
    $this->add_control(
      'section_bottom_title_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team-bottom-content .section_title h4' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'section_bottom_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .team-bottom-content .section_title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'after',
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'section_bottom_content_typography',
        'selector' => '{{WRAPPER}} .team-bottom-content .section_title p',
      ]
    );
    $this->add_control(
      'section_bottom_content_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team-bottom-content .section_title p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'section_bottom_content_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .team-bottom-content .section_title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    $tj_section_subtitle = $settings['tj_section_subtitle'];
    $tj_section_title_mobile = $settings['tj_section_title_mobile'];
    $tj_whyme_image = $settings['tj_why-me-image'];

    $tj_whyme_list = $settings['tj_whyme_list'];


    $tj_bottom_title = $settings['tj_bottom_title'];
    $tj_bottom_content = $settings['tj_bottom_content'];



    if ('layout-2' == $settings['tj_design_style']) :
?>

      <!-- start: Team Layout  -->
      <section class="team-content bg-green">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title text-center">
                <?php if (!empty($tj_section_title)) : ?>
                  <h2 class=" wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($tj_section_title); ?></h2>
                <?php endif;
                if (!empty($tj_section_subtitle)) : ?>
                  <h3 class=" wow fadeInUp" data-wow-delay=".5s"><?php echo tj_kses($tj_section_subtitle); ?></h3>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end: Team Content  -->

      <!-- start: Why Me -->
      <section class="why-me-section" id="why-me">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="why_me_content">

                <?php if (!empty($tj_section_title_mobile)) : ?>
                  <div class="section_title text-center wow fadeInUp  d-md-none" data-wow-delay=".3s">
                    <h2><?php echo tj_kses($tj_section_title_mobile); ?></h2>
                  </div>
                <?php endif;

                if (!empty($tj_whyme_image)) :
                ?>
                  <div class="image wow fadeInUp  d-md-none" data-wow-delay=".3s">
                    <img src="<?php echo esc_url($tj_whyme_image['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($tj_whyme_image['url']), '_wp_attachment_image_alt', true); ?>">
                  </div>
                <?php endif;


                if (!empty($tj_whyme_list)) :
                ?>
                  <div class="why_me_services">

                    <?php foreach ($tj_whyme_list as $key => $item) : ?>
                      <div class="why_me_service wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                        <div class="why_me_service_inner">
                          <div class="icon">
                            <img src="<?php echo esc_url($item['tj_whyme_icon']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['tj_whyme_icon']['url']), '_wp_attachment_image_alt', true); ?>">
                          </div>
                          <div class="content">
                            <h5><?php echo tj_kses($item['tj_whyme_title']); ?></h5>
                            <p><?php echo tj_kses($item['tj_whyme_description']); ?></p>

                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/arrow-down.svg'); ?>" alt="<?php echo esc_attr('arrow down'); ?>">

                            <p class="bottom"><?php echo tj_kses($item['tj_whyme_subtitle']); ?></p>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end: Why Me -->

      <!-- start: Team Content  -->
      <section class="team-bottom-content bg-green d-none d-md-block">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title text-center">
                <?php if (!empty($tj_bottom_title)) : ?>
                  <h4 class=" wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($tj_bottom_title); ?></h4>
                <?php endif;
                if (!empty($tj_bottom_content)) : ?>
                  <p class=" wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($tj_bottom_content); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end: Team Content  -->


    <?php else : ?>
      <!-- start: Why Me -->
      <section class="why-me-section" id="why-me">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="why_me_content">
                <?php if (!empty($tj_section_title_mobile)) : ?>
                  <div class="section_title text-center wow fadeInUp  d-md-none" data-wow-delay=".3s">
                    <h2><?php echo tj_kses($tj_section_title_mobile); ?></h2>
                  </div>
                <?php endif;

                if (!empty($tj_whyme_image)) :
                ?>
                  <div class="image wow fadeInUp" data-wow-delay=".3s">
                    <img src="<?php echo esc_url($tj_whyme_image['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($tj_whyme_image['url']), '_wp_attachment_image_alt', true); ?>">
                  </div>
                <?php endif;
                if (!empty($tj_section_title)) : ?>
                  <div class="section_title text-center wow fadeInUp d-none d-md-block" data-wow-delay=".3s">
                    <h2><?php echo tj_kses($tj_section_title); ?></h2>
                  </div>
                <?php endif;

                if (!empty($tj_whyme_list)) :
                ?>
                  <div class="why_me_services">

                    <?php foreach ($tj_whyme_list as $key => $item) : ?>
                      <div class="why_me_service wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                        <div class="why_me_service_inner">
                          <div class="icon">
                            <img src="<?php echo esc_url($item['tj_whyme_icon']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['tj_whyme_icon']['url']), '_wp_attachment_image_alt', true); ?>">
                          </div>
                          <div class="content">
                            <h5><?php echo tj_kses($item['tj_whyme_title']); ?></h5>
                            <p><?php echo tj_kses($item['tj_whyme_description']); ?></p>

                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/arrow-down.svg'); ?>" alt="<?php echo esc_attr('arrow down'); ?>">

                            <p class="bottom"><?php echo tj_kses($item['tj_whyme_subtitle']); ?></p>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>

                  </div>
                <?php endif; ?>

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
                  <div class="button text-center wow fadeInUp" data-wow-delay=".3s">
                    <a class="btn d-md-none" <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>><?php echo $settings['tj_button_text_mobile']; ?></a>
                    <a class="btn d-none d-md-inline-block" <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>><?php echo $settings['tj_button_text']; ?></a>
                  </div>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end: Why Me -->
    <?php endif; ?>
<?php
  }
}

$widgets_manager->register(new TJ_WhyMe());
