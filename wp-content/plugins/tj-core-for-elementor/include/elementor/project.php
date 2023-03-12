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
class TJ_Projects extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-projects';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('SS Projects', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-gallery-group tj-icon';
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
      'project',
      'projects',
      'tj project',
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
          'left' => esc_html__('Left', 'tjcore'),
          'right' => esc_html__('Right', 'tjcore'),
        ],
        'default' => 'left',
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
      'tj_project_title',
      [
        'label' => esc_html__('Desktop Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Project Title', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_project_title_mobile',
      [
        'label' => esc_html__('Mobile Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Project Title Mobile', 'tjcore'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'tj_project_img',
      [
        'label' => esc_html__('Desktop Image', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'tj_project_img_mobile',
      [
        'label' => esc_html__('Mobile Image', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],

      ]
    );


    $repeater = new Repeater();
    $repeater->add_control(
      'tj_faq_question',
      [
        'label' => esc_html__('Question', 'tjcore'),
        'description' => tj_get_allowed_html_desc('basic'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Question', 'tjcore'),
        'label_block' => true,
      ]
    );
    $repeater->add_control(
      'tj_faq_answer',
      [
        'label' => esc_html__('Answer', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
        'label_block' => true,
      ]
    );

    $this->add_control(
      'tj_faq',
      [
        'label' => esc_html__('FAQs', 'tjcore'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'tj_faq_question' => esc_html__('Aufgabe', 'tjcore'),
            'tj_faq_answer' => tj_kses('<p>Die geforderte Wort-Bild-Marke sollte auf Merchandising Produkten erscheinen und als frisches und
            modernes Logo als Ergänzung zum bestehenden, eher klassischen, Logo von St. Peter-Ording dienen.
            Die Abkürzung “SPO” ist sehr geläufig und sollte damit promoted werden.</p>'),
          ],
          [
            'tj_faq_question' => esc_html__('Umfang', 'tjcore'),
            'tj_faq_answer' => tj_kses('<ul>
            <li>Logo</li>
            <li>Styleguide (zur internen Weiterführung des Designs auf diversen Materialien)</li>
          </ul>'),
          ],
          [
            'tj_faq_question' => esc_html__('Umsetzung', 'tjcore'),
            'tj_faq_answer' => tj_kses('<p>Ich präsentierte 3 Logoansätze inklusive Marktsichtung, Merchandise Vorschlägen und Mockups und
            einem kleinen Corporate Design – dem Mini-Style-Guide</p>'),
          ],
        ],
        'title_field' => '{{{ tj_faq_question }}}',
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
      'tj_button_link_type',
      [
        'label' => esc_html__('Button Link Type', 'tjcore'),
        'type' => Controls_Manager::SELECT,
        'options' => [
          '1' => 'Custom Link',
          '2' => 'Internal Project',
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

    $post_type = 'projects';

    $this->add_control(
      'tj_button_page_link',
      [
        'label' => esc_html__('Select Button Page', 'tjcore'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => tj_get_all_types_post($post_type),
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
        'selector' => '{{WRAPPER}} .faq_content .title',
      ]
    );
    $this->add_control(
      'section_title_color',
      [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .faq_content .title' => 'color: {{VALUE}}',
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
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .faq_accordion .accordion_item .accordion_title' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'faq_title_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
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
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .faq_accordion .accordion_item .accordion_text p, .faq_accordion .accordion_item .accordion_text li' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'faq_desc_margin',
      [
        'label' => esc_html__('Margin', 'textdomain'),
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

    $tj_project_title = $settings['tj_project_title'];
    $tj_project_title_mobile = $settings['tj_project_title_mobile'];

    $tj_project_img = $settings['tj_project_img'];
    $tj_project_img_mobile = $settings['tj_project_img_mobile'];

    $tj_faq = $settings['tj_faq'];
?>

    <section class="services-faq <?php echo esc_attr($settings['tj_design_style']); ?>">
      <img class="faq-image d-none d-md-block" src="<?php echo esc_url($tj_project_img['url']); ?>" alt="<?php echo get_post_meta($tj_project_img['id'], '_wp_attachment_image_alt', true); ?>">
      <?php if (!empty($tj_project_img_mobile['url'])) : ?>
        <img class="faq-image d-md-none" src="<?php echo esc_url($tj_project_img_mobile['url']); ?>" alt="<?php echo get_post_meta($tj_project_img_mobile['id'], '_wp_attachment_image_alt', true); ?>">
      <?php else : ?>
        <img class="faq-image d-md-none" src="<?php echo esc_url($tj_project_img['url']); ?>" alt="<?php echo get_post_meta($tj_project_img['id'], '_wp_attachment_image_alt', true); ?>">
      <?php endif; ?>

      <div class="container">
        <div class="row">
          <div class="col-md-5 <?php if ('left' == $settings['tj_design_style']) : ?>offset-md-7 <?php endif; ?>">
            <div class="faq_content">

              <h3 class="title wow fadeInUp d-none d-md-block" data-wow-delay=".3s"><?php echo tj_kses($tj_project_title); ?></h3>

              <?php if (!empty($tj_project_title_mobile)) : ?>
                <h3 class="title wow fadeInUp d-md-none" data-wow-delay=".3s"><?php echo tj_kses($tj_project_title_mobile); ?></h3>
              <?php else : ?>
                <h3 class="title wow fadeInUp d-md-none" data-wow-delay=".3s"><?php echo tj_kses($tj_project_title); ?></h3>
              <?php endif;

              if (!empty($tj_faq)) :
              ?>
                <div class="faq_accordion d-none d-md-block" id="Faq-<?php echo esc_attr($this->get_ID()); ?>">

                  <?php foreach ($tj_faq as $key => $faq) : ?>
                    <div class="accordion_item wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 4) ?>s">
                      <h6 class="accordion_title collapsed" data-bs-toggle="collapse" data-bs-target="#Faq<?php echo esc_attr($this->get_ID()); ?>-<?php echo esc_attr($key + 1); ?>">
                        <?php echo tj_kses($faq['tj_faq_question']); ?>
                      </h6>
                      <div id="Faq<?php echo esc_attr($this->get_ID()); ?>-<?php echo esc_attr(esc_attr($key + 1)); ?>" class="accordion_text collapse" data-bs-parent="#Faq-<?php echo esc_attr($this->get_ID()); ?>">
                        <?php echo tj_kses($faq['tj_faq_answer']); ?>
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
                <div class="button wow fadeInUp" data-wow-delay=".7s">
                  <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn"><?php echo $settings['tj_button_text']; ?></a>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </section>

<?php
  }
}

$widgets_manager->register(new TJ_Projects());
