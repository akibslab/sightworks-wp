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
class TJ_Hero_Banner extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'hero-banner';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('SS Hero Banner', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-banner tj-icon';
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
            'hero',
            'banner',
            'tj hero',
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
                    'home-hero' => esc_html__('Home Hero', 'tjcore'),
                    'kunden-hero' => esc_html__('Kunden Hero', 'tjcore'),
                    'portfolio-hero' => esc_html__('Portfolio Hero', 'tjcore'),
                    'team-hero' => esc_html__('Team Hero', 'tjcore'),
                    'project-hero' => esc_html__('Project Hero', 'tjcore'),
                ],
                'default' => 'home-hero',
            ]
        );
        $this->end_controls_section();

        // hero content
        $this->start_controls_section(
            'tj_content',
            [
                'label' => esc_html__('Hero Content', 'tjcore'),
            ]
        );
        $this->add_control(
            'hero_image',
            [
                'label' => esc_html__('Choose Image', 'tjcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tj_design_style!' => 'home-hero',
                ],
            ]
        );
        $this->add_control(
            'hero_mobile_image',
            [
                'label' => esc_html__('Mobile Image', 'tjcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tj_design_style' => ['kunden-hero', 'portfolio-hero', 'team-hero', 'project-hero'],
                ],
            ]
        );
        $this->add_control(
            'hero_bold_title',
            [
                'label' => esc_html__('Bold Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS Bold Title', 'tjcore'),
                'placeholder' => esc_html__('Type Bold Heading Text', 'tjcore'),
                'label_block' => true,
                'separator' => 'before',
                'condition' => [
                    'tj_design_style!' => 'project-hero',
                ],
            ]
        );
        $this->add_control(
            'hero_light_title',
            [
                'label' => esc_html__('Light Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS Light Title', 'tjcore'),
                'placeholder' => esc_html__('Type Light Heading Text', 'tjcore'),
                'label_block' => true,
                'condition' => [
                    'tj_design_style!' => 'project-hero',
                ],
            ]
        );
        $this->add_control(
            'hero_mobile_light_title',
            [
                'label' => esc_html__('Mobile Light Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS Light Title', 'tjcore'),
                'placeholder' => esc_html__('Type Light Heading Text', 'tjcore'),
                'label_block' => true, 'condition' => [
                    'tj_design_style' => 'team-hero',
                ],
            ]
        );
        $this->add_control(
            'hero_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS Sub Title', 'tjcore'),
                'placeholder' => esc_html__('Type Sub Heading Text', 'tjcore'),
                'label_block' => true,
                'condition' => [
                    'tj_design_style' => ['home-hero', 'portfolio-hero'],
                ],
            ]
        );
        $this->add_control(
            'hero_desc',
            [
                'label' => esc_html__('Description', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS description', 'tjcore'),
                'placeholder' => esc_html__('Type description text', 'tjcore'),
                'label_block' => true,
                'condition' => [
                    'tj_design_style' => ['kunden-hero'],
                ],
            ]
        );
        $this->end_controls_section();

        // hero button
        $this->start_controls_section(
            'tj_button',
            [
                'label' => esc_html__('Button', 'tjcore'),
                'condition' => [
                    'tj_design_style' => 'home-hero',
                ],
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
            'section_style',
            [
                'label' => __('Bold Title', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tj_design_style!' => ['project-hero'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero_content .title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_content .title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .hero_content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'light_section_style',
            [
                'label' => __('light Title', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tj_design_style!' => ['project-hero'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'light_title_typography',
                'selector' => '{{WRAPPER}} .hero_content .title-2',
            ]
        );
        $this->add_control(
            'light_title_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_content .title-2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'light_title_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .hero_content .title-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sub_title_section_style',
            [
                'label' => __('Sub Title', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tj_design_style' => ['home-hero', 'portfolio-hero'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .hero_content .subtitle',
            ]
        );
        $this->add_control(
            'sub_title_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_content .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'sub_title_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .hero_content .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'description_section_style',
            [
                'label' => __('Description', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tj_design_style' => ['kunden-hero'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .hero_content .text',
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_content .text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .hero_content .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $hero_image = $settings['hero_image'];
        $hero_mobile_image = $settings['hero_mobile_image'];

        $hero_bold_title = $settings['hero_bold_title'];
        $hero_light_title = $settings['hero_light_title'];
        $hero_mobile_light_title = $settings['hero_mobile_light_title'];
        $hero_sub_title = $settings['hero_sub_title'];
        $hero_desc = $settings['hero_desc'];

        $hero_button_show = $settings['tj_button_show'];
        $hero_button_text = $settings['tj_button_text'];
        $hero_button_link = $settings['tj_button_link'];
        $hero_button_page_link = $settings['tj_button_page_link'];

        if ($settings['tj_design_style']  == 'project-hero') : ?>

            <!-- start: Project Details Hero -->
            <?php if (!empty($hero_mobile_image['url'])) : ?>
                <style>
                    @media only screen and (max-width: 767px) {
                        .hero-section.mobile_bg-<?php echo esc_attr($this->get_ID()); ?> {
                            background-image: url(<?php echo esc_url($hero_mobile_image['url']); ?>) !important;
                        }
                    }
                </style>
            <?php endif; ?>
            <section class="hero-section mobile_bg-<?php echo esc_attr($this->get_ID()); ?>" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>);">
                <!-- mobile bg change -->
                <div class="container">
                    <div class="row">
                        <div class="col">

                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Project Details Hero -->

        <?php elseif ($settings['tj_design_style']  == 'kunden-hero') : ?>

            <!-- start: Kunden Hero -->
            <style>
                @media only screen and (max-width: 767px) {
                    .hero-section.kunden {
                        background-image: url(<?php echo esc_url($hero_mobile_image['url']); ?>) !important;
                    }
                }
            </style>
            <section class="hero-section kunden" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4 col-xl-7 offset-xl-5 col-xxl-6 offset-xxl-6">
                            <div class="hero_content">
                                <h1 class="title"><?php echo tj_kses($hero_bold_title); ?></h1>
                                <h2 class="title-2 wow fadeInDown" data-wow-delay=".7s"><?php echo tj_kses($hero_light_title); ?></h2>


                                <p class="text wow fadeIn d-none d-md-block" data-wow-delay=".5s"><?php echo tj_kses($hero_desc); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="mobile-hero-section bg-blue">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="hero_content">
                                <p class="text wow fadeInUp d-md-none" data-wow-delay=".3s"><?php echo tj_kses($hero_desc); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Kunden Hero -->

        <?php elseif ($settings['tj_design_style'] == 'portfolio-hero') : ?>

            <!-- start: Portfolio Hero -->
            <style>
                @media only screen and (max-width: 767px) {
                    .hero-section.portfolio {
                        background-image: url(<?php echo esc_url($hero_mobile_image['url']); ?>) !important;
                    }
                }
            </style>
            <section class="hero-section portfolio" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="hero_content">
                                <h1 class="title"><?php echo tj_kses($hero_bold_title); ?></h1>
                                <h2 class="title-2 wow fadeInDown" data-wow-delay=".3s"><?php echo tj_kses($hero_light_title); ?></h2>

                                <h5 class="subtitle wow fadeIn d-none d-md-block" data-wow-delay=".5s"><?php echo tj_kses($hero_sub_title); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mobile-hero-section bg-blue">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="hero_content">
                                <p class="text wow fadeInUp d-md-none" data-wow-delay=".3s"><?php echo tj_kses($hero_sub_title); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Portfolio Hero -->

        <?php elseif ($settings['tj_design_style'] == 'team-hero') : ?>

            <!-- start: Team Hero -->
            <style>
                @keyframes background {
                    0% {
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero/team-bg.jpg');
                    }

                    100% {
                        background-image: url(<?php echo esc_url($hero_image['url']); ?>);
                    }
                }

                @-webkit-keyframes background {
                    0% {
                        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero/team-bg.jpg');
                    }

                    100% {
                        background-image: url(<?php echo esc_url($hero_image['url']); ?>);
                    }
                }

                @media only screen and (max-width: 767px) {
                    .hero-section.team {
                        background-image: url(<?php echo esc_url($hero_mobile_image['url']); ?>) !important;
                    }
                }
            </style>
            <section class="hero-section team" style="background-image: url(<?php echo esc_url($hero_image['url']); ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4 col-xl-7 offset-xl-5 col-xxl-6 offset-xxl-6">
                            <div class="hero_content">
                                <h1 class="title wow fadeInDown" data-wow-delay=".3s"><?php echo tj_kses($hero_bold_title); ?></h1>


                                <h2 class="title-2 wow fadeInDown d-none d-md-block" data-wow-delay=".7s"><?php echo tj_kses($hero_light_title); ?></h2>
                                <h2 class="title-2 wow fadeInDown d-md-none" data-wow-delay=".7s"><?php echo tj_kses($hero_mobile_light_title); ?></h2>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Team Hero -->

        <?php else : ?>
            <section class="hero-section hero-video">
                <div class="hero-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4 col-xl-7 offset-xl-5 col-xxl-6 offset-xxl-6">
                            <div class="hero_content">
                                <h1 class="title"><?php echo tj_kses($hero_bold_title); ?></h1>
                                <h2 class="title-2 wow fadeIn d-none d-lg-block" data-wow-delay="3s"><?php echo tj_kses($hero_light_title); ?></h2>
                                <h2 class="title-2 wow fadeIn d-lg-none" data-wow-delay=".5s"><?php echo tj_kses($hero_light_title); ?></h2>


                                <h5 class="subtitle wow fadeInDown d-none d-lg-block" data-wow-delay="3.4s"><?php echo tj_kses($hero_sub_title); ?></h5>
                                <h5 class="subtitle wow fadeInDown d-lg-none" data-wow-delay=".7s"><?php echo tj_kses($hero_sub_title); ?></h5>

                                <?php if (!empty($hero_button_show)) :

                                    // Link
                                    if ('2' == $settings['tj_button_link_type']) {
                                        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($hero_button_page_link));
                                        $this->add_render_attribute('tj-button-arg', 'target', '_self');
                                        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
                                    } else {
                                        if (!empty($hero_button_link['url'])) {
                                            $this->add_link_attributes('tj-button-arg', $hero_button_link);
                                        }
                                    }
                                ?>
                                    <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInDown d-none d-lg-inline-block" data-wow-delay="3.6s"><?php echo $hero_button_text; ?></a>
                                    <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInDown d-none d-md-inline-block d-lg-none" data-wow-delay=".9s"><?php echo $hero_button_text; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Home Hero -->
        <?php endif; ?>

<?php

    }
}

$widgets_manager->register(new TJ_Hero_Banner());
