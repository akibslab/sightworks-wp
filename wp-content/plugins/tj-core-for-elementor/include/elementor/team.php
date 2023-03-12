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
 * Elementor widget for Team.
 *
 */
class TJ_Team extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-team';
    }

    /**
     * Retrieve the widget title.
     */
    public function get_title() {
        return __('SS Team', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-person tj-icon';
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
            'team',
            'teams',
            'tj team',
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

        // member list
        $this->start_controls_section(
            '_section_teams',
            [
                'label' => __('Members', 'tjcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'tjcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'tjcore'),
                'placeholder' => __('Type title here', 'tjcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Content', 'tjcore'),
                'placeholder' => __('Type designation here', 'tjcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // REPEATER
        $this->add_control(
            'teams',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'default' => [
                    [
                        'title' => esc_html__('Wordpress, SEO', 'tjcore'),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'title' => esc_html__('Social Media', 'tjcore'),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'title' => esc_html__('Contentcreator', 'tjcore'),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],

                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'tjcore'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'tjcore'),
                    'uppercase' => __('UPPERCASE', 'tjcore'),
                    'lowercase' => __('lowercase', 'tjcore'),
                    'capitalize' => __('Capitalize', 'tjcore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

        $teams = $settings['teams'];
?>



        <!-- start: Team Member -->
        <section class="team-member">
            <div class="container">
                <?php if (!empty($tj_section_title)) : ?>
                    <div class="row d-md-none">
                        <div class="col">
                            <div class="section_title text-center wow fadeInUp" data-wow-delay=".3s">
                                <h2><?php echo tj_kses($tj_section_title); ?></h2>
                            </div>
                        </div>
                    </div>
                <?php endif;

                if (!empty($teams)) :
                ?>
                    <div class="row">
                        <?php foreach ($teams as $key => $team) : ?>
                            <div class="col-md-4">
                                <div class="single_team_member wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3); ?>s">
                                    <div class="member_image">
                                        <img src="<?php echo esc_url($team['image']['url']) ?>" alt="<?php echo esc_attr(get_post_meta($team["image"]["id"], "_wp_attachment_image_alt", true)) ?>">
                                    </div>
                                    <div class="member_content">
                                        <h5><?php echo tj_kses($team['title']); ?></h5>
                                        <p> <?php echo tj_kses($team['content']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>
        <!-- end: Team Member -->

<?php
    }
}

$widgets_manager->register(new TJ_Team());
