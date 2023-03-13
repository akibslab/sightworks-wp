<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * SS Core
 *
 * Elementor widget for CTA.
 *
 */
class TJ_CTA extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-cta';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('SS CTA', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-call-to-action tj-icon';
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
            'cta',
            'call-to-action',
            'tj cta',
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
                    'default' => esc_html__('Default', 'tjcore'),
                    'home-cta' => esc_html__('Home CTA', 'tjcore'),
                    'kunden-cta' => esc_html__('Kunden CTA', 'tjcore'),
                    'portfolio-cta' => esc_html__('Portfolio CTA', 'tjcore'),
                    'team-cta' => esc_html__('Team CTA', 'tjcore'),
                ],
                'default' => 'default',
            ]
        );
        $this->end_controls_section();

        // first cta
        $this->start_controls_section(
            'tj_cta',
            [
                'label' => esc_html__('First CTA', 'tjcore'),
                'condition' => [
                    'tj_design_style!' => ['team-cta', 'default'],
                ]
            ]
        );
        $this->add_control(
            'first_cta_title',
            [
                'label' => esc_html__('CTA Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CTA Title', 'tjcore'),
                'placeholder' => esc_html__('Type cta title here.', 'tjcore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'first_cta_desc',
            [
                'label' => esc_html__('Description', 'tjcore'),
                'description' => tj_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS cta description here', 'tjcore'),
                'placeholder' => esc_html__('Type section description here', 'tjcore'),
                'condition' => [
                    'tj_design_style!' => ['kunden-cta', 'portfolio-cta'],
                ]
            ]
        );
        $this->add_control(
            'first_cta_list',
            [
                'label' => esc_html__('Item List', 'tjcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_text',
                        'label' => esc_html__('Text', 'tjcore'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List text', 'tjcore'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'list_text' => esc_html__('Title #1', 'tjcore'),
                    ],
                    [
                        'list_text' => esc_html__('Title #1', 'tjcore'),
                    ],
                ],
                'title_field' => '{{{ list_text }}}',
                'condition' => [
                    'tj_design_style' => ['kunden-cta', 'portfolio-cta'],
                ]
            ]
        );
        $this->end_controls_section();

        // second cta
        $this->start_controls_section(
            'tj_second_cta',
            [
                'label' => esc_html__('Second CTA', 'tjcore'),
                'condition' => [
                    'tj_design_style!' => ['portfolio-cta', 'team-cta', 'default'],
                ]
            ]
        );
        $this->add_control(
            'second_cta_title',
            [
                'label' => esc_html__('CTA Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CTA Title', 'tjcore'),
                'placeholder' => esc_html__('Type cta title here.', 'tjcore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'second_cta_desc',
            [
                'label' => esc_html__('Description', 'tjcore'),
                'description' => tj_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS cta description here', 'tjcore'),
                'placeholder' => esc_html__('Type section description here', 'tjcore'),
                'condition' => [
                    'tj_design_style' => ['kunden-cta'],
                ]
            ]
        );
        $this->add_control(
            'second_cta_list',
            [
                'label' => esc_html__('Item List', 'tjcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_text',
                        'label' => esc_html__('Text', 'tjcore'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List text', 'tjcore'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'list_text' => esc_html__('Title #1', 'tjcore'),
                    ],
                    [
                        'list_text' => esc_html__('Title #1', 'tjcore'),
                    ],
                ],
                'title_field' => '{{{ list_text }}}',
                'condition' => [
                    'tj_design_style' => ['home-cta'],
                ]
            ]
        );
        $this->end_controls_section();

        // third cta
        $this->start_controls_section(
            'tj_third_cta',
            [
                'label' => esc_html__('Third CTA', 'tjcore'),
            ]
        );
        $this->add_control(
            'third_cta_title',
            [
                'label' => esc_html__('CTA Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CTA Title', 'tjcore'),
                'placeholder' => esc_html__('Type cta title here.', 'tjcore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'third_cta_desc',
            [
                'label' => esc_html__('Description', 'tjcore'),
                'description' => tj_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SS cta description here', 'tjcore'),
                'placeholder' => esc_html__('Type section description here', 'tjcore'),
            ]
        );

        // button
        $this->add_control(
            'tj_btn_button_show',
            [
                'label' => esc_html__('Show Button', 'tjcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'tjcore'),
                'label_off' => esc_html__('Hide', 'tjcore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'tj_btn_text',
            [
                'label' => esc_html__('Button Text', 'tjcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'tjcore'),
                'title' => esc_html__('Enter button text', 'tjcore'),
                'label_block' => true,
                'condition' => [
                    'tj_btn_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'tj_btn_link_type',
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
                    'tj_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tj_btn_link',
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
                    'tj_btn_link_type' => '1',
                    'tj_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tj_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tjcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tj_get_all_pages(),
                'condition' => [
                    'tj_btn_link_type' => '2',
                    'tj_btn_button_show' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();

        // third cta
        $this->start_controls_section(
            'cta_image',
            [
                'label' => esc_html__('CTA Image', 'tjcore'),
                'condition' => [
                    'tj_design_style' => ['team-cta'],
                ]
            ]
        );
        $this->add_control(
            'tj_cta_img',
            [
                'label' => esc_html__('CTA Image', 'tjcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $this->end_controls_section();


        // TAB_STYLE
        $this->start_controls_section(
            '_cta_title',
            [
                'label' => __('Title', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .cta_content .title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_content .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .cta_content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_cta_content',
            [
                'label' => __('Content', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .cta_content .text, .cta_content .list-style li',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_content .text, .cta_content .list-style li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'content_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .cta_content .text, .cta_content .list-style li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $first_cta_title = $settings['first_cta_title'];
        $first_cta_desc = $settings['first_cta_desc'];
        $first_cta_list = $settings['first_cta_list'];

        $second_cta_title = $settings['second_cta_title'];
        $second_cta_desc = $settings['second_cta_desc'];
        $second_cta_list = $settings['second_cta_list'];

        $third_cta_title = $settings['third_cta_title'];
        $third_cta_desc = $settings['third_cta_desc'];


        $tj_cta_img = $settings['tj_cta_img'];

        $button_show = $settings['tj_btn_button_show'];


        if ($settings['tj_design_style']  == 'home-cta') :
?>

            <!-- start: Home CTA -->
            <section class="cta-section ">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($first_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($first_cta_title); ?></h2>
                                <?php endif; ?>
                                <span class="icon wow fadeInUp d-none d-md-block" data-wow-delay=".4s">
                                    <i class="fas fa-star"></i>
                                </span>
                                <?php if (!empty($first_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".5s"><?php echo tj_kses($first_cta_desc); ?></p>
                                <?php endif; ?>
                                <span class="divider wow fadeInUp" data-wow-delay=".6s"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($second_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($second_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($second_cta_list)) : ?>
                                    <ul class="list-style wow fadeInUp" data-wow-delay=".4s">
                                        <?php foreach ($second_cta_list as $key => $list) : ?>
                                            <li><?php echo tj_kses($list['list_text']); ?></li>
                                        <?php endforeach; ?>

                                    </ul>
                                <?php endif; ?>

                                <span class="divider wow fadeInUp" data-wow-delay=".5s"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($third_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($third_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($third_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($third_cta_desc); ?></p>
                                <?php endif;
                                if (!empty($button_show)) :

                                    if ('2' == $settings['tj_btn_link_type']) {
                                        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
                                        $this->add_render_attribute('tj-button-arg', 'target', '_self');
                                        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
                                    } else {
                                        if (!empty($settings['tj_btn_link']['url'])) {
                                            $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
                                        }
                                    }
                                ?>
                                    <div class="button text-center">
                                        <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInUp" data-wow-delay=".5s"><?php echo $settings['tj_btn_text']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Home CTA -->

        <?php elseif ($settings['tj_design_style']  == 'kunden-cta') : ?>

            <!-- start: Kunden CTA -->
            <section class="cta-section kunden">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($first_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($first_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($first_cta_list)) : ?>
                                    <ul class="list-style column wow fadeInUp" data-wow-delay=".4s">
                                        <?php foreach ($first_cta_list as $key => $list) : ?>
                                            <li><?php echo tj_kses($list['list_text']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <span class="divider"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($second_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($second_cta_title); ?></h2>
                                <?php endif; ?>
                                <span class="icon wow fadeInUp d-none d-md-block" data-wow-delay=".4s">
                                    <i class="fas fa-star"></i>
                                </span>
                                <?php if (!empty($second_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".5s"><?php echo tj_kses($second_cta_desc); ?></p>
                                <?php endif; ?>
                                <span class="divider"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($third_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($third_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($third_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($third_cta_desc); ?></p>
                                <?php endif;

                                if (!empty($button_show)) :

                                    if ('2' == $settings['tj_btn_link_type']) {
                                        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
                                        $this->add_render_attribute('tj-button-arg', 'target', '_self');
                                        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
                                    } else {
                                        if (!empty($settings['tj_btn_link']['url'])) {
                                            $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
                                        }
                                    }
                                ?>
                                    <div class="button text-center">
                                        <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInUp" data-wow-delay=".5s"><?php echo $settings['tj_btn_text']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Kunden CTA -->

        <?php elseif ($settings['tj_design_style']  == 'portfolio-cta') : ?>

            <!-- start: Portfolio CTA -->
            <section class="cta-section kunden d-md-none">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($first_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($first_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($first_cta_list)) : ?>
                                    <ul class="list-style column wow fadeInUp" data-wow-delay=".4s">
                                        <?php foreach ($first_cta_list as $key => $list) : ?>
                                            <li><?php echo tj_kses($list['list_text']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <span class="divider"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($third_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($third_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($third_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($third_cta_desc); ?></p>
                                <?php endif;

                                if (!empty($button_show)) :

                                    if ('2' == $settings['tj_btn_link_type']) {
                                        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
                                        $this->add_render_attribute('tj-button-arg', 'target', '_self');
                                        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
                                    } else {
                                        if (!empty($settings['tj_btn_link']['url'])) {
                                            $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
                                        }
                                    }
                                ?>
                                    <div class="button text-center">
                                        <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInUp" data-wow-delay=".5s"><?php echo $settings['tj_btn_text']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Portfolio CTA -->

        <?php elseif ($settings['tj_design_style']  == 'team-cta') : ?>

            <!-- start: Team CTA -->
            <section class="cta-section team">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($third_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($third_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($third_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($third_cta_desc); ?></p>
                                <?php endif;

                                if (!empty($button_show)) :

                                    if ('2' == $settings['tj_btn_link_type']) {
                                        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
                                        $this->add_render_attribute('tj-button-arg', 'target', '_self');
                                        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
                                    } else {
                                        if (!empty($settings['tj_btn_link']['url'])) {
                                            $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
                                        }
                                    }
                                ?>
                                    <div class="button text-center">
                                        <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInUp" data-wow-delay=".5s"><?php echo $settings['tj_btn_text']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- start: Team Bottom Image -->
            <sectionl class="team-bottom-img d-none d-md-block" style="background-image: url(<?php echo esc_url($tj_cta_img['url']); ?>);">

            </sectionl>
            <!-- end: Team Bottom Image -->

            <!-- end: Team CTA -->

        <?php else : ?>

            <!-- Start: Default CTA -->
            <section class="cta-section details-page">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cta_content">
                                <?php if (!empty($third_cta_title)) : ?>
                                    <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($third_cta_title); ?></h2>
                                <?php endif;
                                if (!empty($third_cta_desc)) : ?>
                                    <p class="text wow fadeInUp" data-wow-delay=".4s"><?php echo tj_kses($third_cta_desc); ?></p>
                                <?php endif;

                                if (!empty($button_show)) :

                                    if ('2' == $settings['tj_btn_link_type']) {
                                        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
                                        $this->add_render_attribute('tj-button-arg', 'target', '_self');
                                        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
                                    } else {
                                        if (!empty($settings['tj_btn_link']['url'])) {
                                            $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
                                        }
                                    }
                                ?>
                                    <div class="button text-center">
                                        <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn wow fadeInUp" data-wow-delay=".5s"><?php echo $settings['tj_btn_text']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Default CTA -->

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TJ_CTA());
