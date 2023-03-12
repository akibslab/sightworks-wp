<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor widget for Hero Banner.
 *
 * @since 1.0.0
 */
class TJ_Contact_Hero extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'contact-hero';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('SS Contact Hero', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-comments tj-icon';
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
      'contact-hero',
      'banner',
      'tj contact-hero',
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

    // hero content
    $this->start_controls_section(
      'tj_content',
      [
        'label' => esc_html__('Hero Content', 'tjcore'),
      ]
    );

    $this->add_control(
      'contact_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('SS Title', 'tjcore'),
        'placeholder' => esc_html__('Type title here.', 'tjcore'),
        'label_block' => true,
        'rows' => 3,
      ]
    );
    $this->add_control(
      'contact_title_mobile',
      [
        'label' => esc_html__('Mobile Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('SS Title', 'tjcore'),
        'placeholder' => esc_html__('Type title here.', 'tjcore'),
        'label_block' => true,
        'rows' => 3,
      ]
    );
    $this->add_control(
      'contact_text',
      [
        'label' => esc_html__('Text', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('SS content', 'tjcore'),
        'placeholder' => esc_html__('Type text here.', 'tjcore'),
        'label_block' => true,
        'separator' => 'after',
      ]
    );
    $this->add_control(
      'button_text',
      [
        'label' => esc_html__('Button Text', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Schreiben', 'tjcore'),
      ]
    );
    $this->add_control(
      'button_link',
      [
        'label' => esc_html__('Button Link', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('anfrage@sightworks.de', 'tjcore'),
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      '_shortcode',
      [
        'label' => esc_html__('Shortcode', 'tjcore'),
      ]
    );

    $this->add_control(
      'calendly_shortcode',
      [
        'label' => esc_html__('Calendly Shortcode', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Paste shortcode here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      '_user_info',
      [
        'label' => esc_html__('User Info', 'tjcore'),
      ]
    );
    $this->add_control(
      'user_image',
      [
        'label' => esc_html__('Image', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
    $this->add_control(
      'user_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => tj_kses('SIGHTWORKS <br> Studio für Design'),
        'placeholder' => esc_html__('Type title here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'user_address',
      [
        'label' => esc_html__('Address', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => tj_kses('Andrea Lechler <br>
        D 22607 Hamburg'),
        'placeholder' => esc_html__('Type address here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'user_phone',
      [
        'label' => esc_html__('Phone', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('+49 0177 8025087', 'tjcore'),
        'placeholder' => esc_html__('Type phone here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'user_email',
      [
        'label' => esc_html__('Email', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('anfrage@sightworks.de', 'tjcore'),
        'placeholder' => esc_html__('Type email here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->end_controls_section();


    $this->start_controls_section(
      '_calendly_button',
      [
        'label' => esc_html__('Calendly Button', 'tjcore'),
      ]
    );
    $this->add_control(
      'c_button_text',
      [
        'label' => esc_html__('Button Text', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Call buchen', 'tjcore'),
      ]
    );
    $this->add_control(
      'c_button_link',
      [
        'label' => esc_html__('Button Link', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('https://calendly.com/sightworks/15min', 'tjcore'),
      ]
    );
    $this->end_controls_section();



    // TAB_STYLE
    $this->start_controls_section(
      'section_style',
      [
        'label' => __('Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .contact_hero_content h6',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .contact_hero_content h6' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .contact_hero_content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();


    $this->start_controls_section(
      'mobile_section_style',
      [
        'label' => __('Mobile Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'mobile_title_typography',
        'selector' => '{{WRAPPER}} .contact_hero_content .title',
      ]
    );
    $this->add_control(
      'mobile_title_color',
      [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .contact_hero_content .title' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'mobile_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .contact_hero_content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    $this->end_controls_section();


    $this->start_controls_section(
      'text_section_style',
      [
        'label' => __('Text', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'text_typography',
        'selector' => '{{WRAPPER}} .contact_hero_content p',
      ]
    );
    $this->add_control(
      'text_color',
      [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .contact_hero_content p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'text_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .contact_hero_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $contact_title = $settings['contact_title'];
    $contact_title_mobile = $settings['contact_title_mobile'];
    $contact_text = $settings['contact_text'];
    $button_text = $settings['button_text'];
    $button_link = $settings['button_link'];

    $calendly_shortcode = $settings['calendly_shortcode'];

    $user_image = $settings['user_image'];
    $user_title = $settings['user_title'];
    $user_address = $settings['user_address'];
    $user_phone = $settings['user_phone'];
    $user_email = $settings['user_email'];

    $c_button_text = $settings['c_button_text'];
    $c_button_link = $settings['c_button_link'];

?>
    <!-- start: Hero Section -->
    <section class="contact-hero bg-light-blue">
      <div class="container">
        <div class="contact_hero_container">
          <div class="row">
            <div class="col-md-7">
              <div class="contact_hero_calender d-none d-md-block">
                <?php echo $calendly_shortcode; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="contact_hero_content">

                <h1 class="title wow fadeInDown d-md-none" data-wow-delay=".3s">
                  <?php echo tj_kses($contact_title_mobile); ?>
                </h1>
                <div class="buttons wow fadeInUp d-md-none" data-wow-delay=".4s">
                  <a href="mailto:<?php echo $button_link; ?>" class="btn"><?php echo tj_kses($button_text); ?></a>
                  <a href="<?php echo $c_button_link; ?>" class="btn"><?php echo tj_kses($c_button_text); ?></a>
                </div>

                <h6 class=" wow fadeInUp d-none d-md-block" data-wow-delay=".3s"><?php echo tj_kses($contact_title); ?></h6>

                <p class=" wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($contact_text); ?></p>
              </div>
              <div class="buttons wow fadeInUp d-none d-md-block" data-wow-delay=".6s">
                <a href="mailto:<?php echo $button_link; ?>" class="btn"><?php echo tj_kses($button_text); ?></a>
              </div>
            </div>
          </div>
        </div>


        <div class="user_section">
          <div class="row">
            <div class="col-md-7">
              <div class="user_image">
                <img src="<?php echo esc_url($user_image['url']); ?>" alt="<?php echo get_post_meta($user_image['id'], '_wp_attachment_image_alt', true); ?>">
              </div>
            </div>
            <div class="col-md-5  d-none d-md-block">
              <div class="user_info">
                <h6><?php echo tj_kses($user_title) ?></h6>
                <p>
                  <span class="address"><?php echo tj_kses($user_address) ?></span>

                  <a href="tel:<?php echo $user_phone; ?>" class="phone"><?php echo tj_kses($user_phone) ?></a>
                  <a href="mailto:<?php echo $user_email; ?>" class="email"><?php echo tj_kses($user_email); ?></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Hero Section -->


<?php

  }
}

$widgets_manager->register(new TJ_Contact_Hero());
