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
 * Elementor widget for Testimonial.
 *
 */
class TJ_Testimonial extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-testimonial';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('SS Testimonial', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-testimonial-carousel tj-icon';
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
            'testimonial',
            'testimonials',
            'tj testimonial',
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
        $this->add_control(
            'tj_section_title_mobile',
            [
                'label' => esc_html__('Mobile Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Section Title', 'tjcore'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();


        // Review group
        $this->start_controls_section(
            'tj_testimonials',
            [
                'label' => esc_html__('Testimonials', 'tjcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'review_title',
            [
                'label' => esc_html__('Review title', 'tjcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Review title', 'tjcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__('Review Content', 'tjcore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => esc_html__('Type your review content here', 'tjcore'),
            ]
        );
        $repeater->add_control(
            'company_logo',
            [
                'label' => esc_html__('Company Logo', 'tjcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'company_text',
            [
                'label' => esc_html__('Company Text', 'tjcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Rasalina William', 'tjcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'testimonial_list',
            [
                'label' => esc_html__('Testimonial List', 'tjcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'review_title' => esc_html__('Sie denkt mit, überrascht mit kreativen Ideen und gibt wertvolle Impulse.', 'tjcore'),
                    ],
                    [
                        'review_title' => esc_html__('Sie denkt mit, überrascht mit kreativen Ideen und gibt wertvolle Impulse.', 'tjcore'),
                    ],
                    [
                        'review_title' => esc_html__('Sie denkt mit, überrascht mit kreativen Ideen und gibt wertvolle Impulse.', 'tjcore'),
                    ],

                ],
                'title_field' => '{{{ review_title }}}',
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
                'selector' => '{{WRAPPER}} .testimonial_section_content .section_title h2',
            ]
        );
        $this->add_control(
            'section_title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_section_content .section_title h2' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial_section_content .section_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // testi title
        $this->start_controls_section(
            'review_title',
            [
                'label' => __('Review Title', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'review_title_typography',
                'selector' => '{{WRAPPER}} .testimonial_inner .title',
            ]
        );
        $this->add_control(
            'review_title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'review_title_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // testi content
        $this->start_controls_section(
            'review_content',
            [
                'label' => __('Review Content', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'review_content_typography',
                'selector' => '{{WRAPPER}} .testimonial_inner p',
            ]
        );
        $this->add_control(
            'review_content_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'review_content_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // company text
        $this->start_controls_section(
            'company_text',
            [
                'label' => __('Company Text', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'company_text_typography',
                'selector' => '{{WRAPPER}} .testimonial_inner .testimonial_bottom .company_text',
            ]
        );
        $this->add_control(
            'company_text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner .testimonial_bottom .company_text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'company_text_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner .testimonial_bottom .company_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $tj_section_title = $settings['tj_section_title'];
        $tj_section_title_mobile = $settings['tj_section_title_mobile'];

        $testimonial_list = $settings['testimonial_list'];

?>

        <!-- start: Testimonial Section -->
        <script>
            jQuery(document).ready(function($) {
                if ($(".testimonial_active").length > 0) {
                    $(".testimonial_active").slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        // speed: 1000,
                        autoplay: false,
                        autoplaySpeed: 3000,
                        centerMode: true,
                        variableWidth: true,
                        touchMove: true,
                        cssEase: "ease",
                        arrows: true,
                        dots: false,
                        prevArrow: $(".prev"),
                        nextArrow: $(".next"),
                        responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                arrows: false,
                                dots: true,
                                infinite: false,
                            },
                        }, ],
                    });
                }
            })
        </script>
        <section class="testimonial-section">
            <div class="container-fluid gx-0 overflow-hidden">
                <div class="row">
                    <div class="col">
                        <div class="testimonial_section_content">

                            <?php if (!empty($tj_section_title || $tj_section_title_mobile)) : ?>
                                <div class="section_title text-center wow fadeInUp" data-wow-delay=".3s">
                                    <h2 class="d-md-none"><?php echo tj_kses($tj_section_title); ?></h2>
                                    <h2 class="d-none d-md-block"><?php echo tj_kses($tj_section_title_mobile); ?></h2>
                                </div>
                            <?php endif;

                            if (!empty($testimonial_list)) :
                            ?>
                                <div class="testimonial_carousel testimonial_active">

                                    <?php foreach ($testimonial_list as $key => $testimonial) : ?>
                                        <div class="single_testimonial">
                                            <div class="testimonial_inner">
                                                <span class="quote"><?php esc_html_e('”', 'sitghtworks'); ?></span>
                                                <h5 class="title"><?php echo tj_kses($testimonial['review_title']); ?></h5>

                                                <?php echo tj_kses($testimonial['review_content']); ?>

                                                <div class="testimonial_bottom">
                                                    <div class="company_logo">
                                                        <img src="<?php echo esc_url($testimonial['company_logo']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($testimonial['company_logo']["id"], "_wp_attachment_image_alt", true)) ?>">
                                                    </div>
                                                    <div class="company_text"><?php echo tj_kses($testimonial['company_text']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>

                            <div class="testimonial_navs d-none d-md-flex">
                                <button class="prev"><i class="fas fa-arrow-left"></i></button>
                                <button class="next"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Testimonial Section -->

<?php
    }
}

$widgets_manager->register(new TJ_Testimonial());
