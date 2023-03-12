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
 * Elementor widget for Services.
 */
class TJ_Services extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-services';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('SS Services', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-columns tj-icon';
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
            'service',
            'services',
            'tj service',
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
            'tj_services',
            [
                'label' => esc_html__('Services', 'tjcore'),
                'description' => esc_html__('Control all the style settings from Style tab', 'tjcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'tj_service_icon',
            [
                'label' => esc_html__('Upload Icon Image', 'tjcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $repeater->add_control(
            'tj_service_title',
            [
                'label' => esc_html__('Title', 'tjcore'),
                'description' => tj_get_allowed_html_desc('basic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'tjcore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tj_service_description',
            [
                'label' => esc_html__('Description', 'tjcore'),
                'description' => tj_get_allowed_html_desc('intermediate'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tj_services_list',
            [
                'label' => esc_html__('Services List', 'tjcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tj_service_title' => esc_html__('Sie sind Unternehmer:in und ziemlich busy', 'tjcore'),
                    ],
                    [
                        'tj_service_title' => esc_html__('Sie starten neu durch oder fangen gerade an', 'tjcore'),
                    ],
                    [
                        'tj_service_title' => esc_html__('Sie haben ein neues Produkt oder benötigen ein Re-Branding', 'tjcore'),
                    ],
                    [
                        'tj_service_title' => esc_html__('Sie haben zwar eine Marketingabteilung', 'tjcore'),
                    ],
                    [
                        'tj_service_title' => esc_html__('Sie wollen eigentlich nur luschern', 'tjcore'),
                    ],
                ],
                'title_field' => '{{{ tj_service_title }}}',
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
                'selector' => '{{WRAPPER}} .services-section .section_title .title',
            ]
        );
        $this->add_control(
            'section_title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-section .section_title .title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .services-section .section_title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'service_title',
            [
                'label' => __('Service Title', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_title_typography',
                'selector' => '{{WRAPPER}} .service_inner .content h5',
            ]
        );
        $this->add_control(
            'service_title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_inner .content h5' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .service_inner .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'service_desc',
            [
                'label' => __('Service Description', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_desc_typography',
                'selector' => '{{WRAPPER}} .service_inner .content p',
            ]
        );
        $this->add_control(
            'service_desc_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_inner .content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_desc_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .service_inner .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $services_list = $settings['tj_services_list'];

?>

        <!-- start: Services Section -->
        <section class="services-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php if (!empty($tj_section_title)) : ?>
                            <div class="section_title text-center ">
                                <h2 class="title wow fadeInUp" data-wow-delay=".3s"><?php echo tj_kses($tj_section_title); ?></h2>
                            </div>
                        <?php endif;

                        if (!empty($services_list)) :
                        ?>
                            <div class="services_section">

                                <?php foreach ($services_list as $key => $service) : ?>
                                    <div class="single_service wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                                        <div class="service_inner">
                                            <div class="icon">
                                                <img src="<?php echo esc_url($service['tj_service_icon']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($service['tj_service_icon']['url']), '_wp_attachment_image_alt', true); ?>">
                                            </div>
                                            <div class="content">
                                                <h5><?php echo tj_kses($service['tj_service_title']); ?></h5>
                                                <p><?php echo tj_kses($service['tj_service_description']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>

                        <div class="section_down_arrow d-none d-md-block">
                            <a href="javascript:void(0)"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/arrow-down.svg'); ?>" alt="<?php echo esc_attr("down arrow"); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Services Section -->

<?php
    }
}

$widgets_manager->register(new TJ_Services());
