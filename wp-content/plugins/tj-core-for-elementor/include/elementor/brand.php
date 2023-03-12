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
 * Elementor widget for Brand Carousel.
 *
 */
class TJ_Brand extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 */
	public function get_name() {
		return 'tj-brand';
	}

	/**
	 * Retrieve the widget title.
	 *
	 */
	public function get_title() {
		return __('SS Brand', 'tjcore');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 */
	public function get_icon() {
		return 'eicon-carousel tj-icon';
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
			'brand',
			'brands',
			'tj brand',
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


		$this->start_controls_section(
			'tj_brand_section',
			[
				'label' => __('Brand Item', 'tjcore'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'tj_brand_image',
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

		$this->add_control(
			'tj_brand_slides',
			[
				'show_label' => false,
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => esc_html__('Brand Item', 'tjcore'),
				'default' => [
					[
						'tj_brand_image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'tj_brand_image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
				]
			]
		);

		$this->end_controls_section();

		// hero button
		$this->start_controls_section(
			'tj_button',
			[
				'label' => esc_html__('Button', 'tjcore'),
				'condition' => [
					'tj_design_style' => 'layout-2',
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


		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'brand_section_padding',
			[
				'label' => esc_html__('Padding', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .clients-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

?>

		<!-- start: Clients Section -->
		<script>
			jQuery(document).ready(function($) {
				if ($(".clients_active").length > 0) {
					$(".clients_active").slick({
						infinite: true,
						slidesToShow: 6,
						slidesToScroll: 1,
						autoplay: true,
						autoplaySpeed: 0,
						speed: 3000,
						cssEase: "linear",
						dots: false,
						arrows: false,
						// centerMode: true,
						variableWidth: true,
						responsive: [{
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
							},
						}, ],
					});
				}
			})
		</script>

		<?php if ('layout-2' == $settings['tj_design_style']) : ?>

			<section class="logos-section">
				<div class="container-fluid gx-0 overflow-hidden">
					<div class="row">
						<div class="col">

							<?php if (!empty($settings['tj_brand_slides'])) : ?>
								<div class="clients_carousel clients_active">

									<?php foreach ($settings['tj_brand_slides'] as $item) : ?>
										<div class="client_logo">
											<img src="<?php echo esc_url($item['tj_brand_image']['url']) ?>" alt="<?php echo esc_attr(get_post_meta($item["tj_brand_image"]["id"], "_wp_attachment_image_alt", true)) ?>">
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
								<div class="button text-center">
									<a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?> class="btn"><?php echo $settings['tj_button_text']; ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php else : ?>

			<section class="clients-section">
				<div class="container-fluid gx-0 overflow-hidden">
					<div class="row">
						<div class="col">
							<?php if (!empty($settings['tj_brand_slides'])) : ?>

								<div class="clients_carousel clients_active">

									<?php foreach ($settings['tj_brand_slides'] as $item) : ?>
										<div class="client_logo">
											<img src="<?php echo esc_url($item['tj_brand_image']['url']) ?>" alt="<?php echo esc_attr(get_post_meta($item["tj_brand_image"]["id"], "_wp_attachment_image_alt", true)) ?>">
										</div>
									<?php endforeach; ?>

								</div>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php endif; ?>

<?php
	}
}

$widgets_manager->register(new TJ_Brand());
