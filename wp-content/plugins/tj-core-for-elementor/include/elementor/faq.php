<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * SS Core
 *
 * Elementor widget for faq.
 *=
 */
class TJ_FAQ extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 */
	public function get_name() {
		return 'tj-faq';
	}

	/**
	 * Retrieve the widget title.
	 *
	 */
	public function get_title() {
		return __('SS FAQ', 'tjcore');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 */
	public function get_icon() {
		return 'eicon-help-o tj-icon';
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
			'faq',
			'faqs',
			'tj faq',
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

		// section title
		$this->start_controls_section(
			'_tj_faq_bottom',
			[
				'label' => esc_html__('Bottom CTA', 'tjcore'),
			]
		);
		$this->add_control(
			'bottom_cta_title',
			[
				'label' => esc_html__('Title', 'tjcore'),
				'description' => tj_get_allowed_html_desc('basic'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Wenn noch eine Frage fehlt ... einfach fragen!', 'tjcore'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'bottom_cta_button_text',
			[
				'label' => esc_html__('Button Text', 'tjcore'),
				'description' => tj_get_allowed_html_desc('basic'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Nachfragen', 'tjcore'),
			]
		);
		$this->add_control(
			'bottom_cta_button_link',
			[
				'label' => esc_html__('Button Link', 'tjcore'),
				'description' => tj_get_allowed_html_desc('basic'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('#', 'tjcore'),
				'label_block' => true,
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'_accordion',
			[
				'label' => esc_html__('Accordion', 'tjcore'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'accordion_title',
			[
				'label' => esc_html__('Accordion Item', 'tjcore'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('This is accordion item title', 'tjcore'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'accordion_description',
			[
				'label' => esc_html__('Description', 'tjcore'),
				'description' => tj_get_allowed_html_desc('intermediate'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Facilis fugiat hic ipsam iusto laudantium libero maiores minima molestiae mollitia repellat rerum sunt ullam voluptates? Perferendis, suscipit.',
				'label_block' => true,
			]
		);
		$this->add_control(
			'accordions',
			[
				'label' => esc_html__('Repeater Accordion', 'tjcore'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'accordion_title' => esc_html__('This is accordion item title #1', 'tjcore'),
					],
					[
						'accordion_title' => esc_html__('This is accordion item title #2', 'tjcore'),
					],
					[
						'accordion_title' => esc_html__('This is accordion item title #3', 'tjcore'),
					],
					[
						'accordion_title' => esc_html__('This is accordion item title #4', 'tjcore'),
					],
				],
				'title_field' => '{{{ accordion_title }}}',
			]
		);
		$this->end_controls_section();


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
				'selector' => '{{WRAPPER}} .contact-faq .section_title h3',
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' => esc_html__('Title Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-faq .section_title h3' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .contact-faq .section_title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'accordion_title',
			[
				'label' => __('Accordion Title', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'accordion_title_typography',
				'selector' => '{{WRAPPER}} .contact-faq .faq_accordion .accordion_item .accordion_title',
			]
		);
		$this->add_control(
			'accordion_title_color',
			[
				'label' => esc_html__('Title Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-faq .faq_accordion .accordion_item .accordion_title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'accordion_title_margin',
			[
				'label' => esc_html__('Margin', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .contact-faq .faq_accordion .accordion_item .accordion_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'accordion_text',
			[
				'label' => __('Accordion Title', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'accordion_text_typography',
				'selector' => '{{WRAPPER}} .contact-faq .faq_accordion .accordion_item .accordion_text p',
			]
		);
		$this->add_control(
			'accordion_text_color',
			[
				'label' => esc_html__('Title Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-faq .faq_accordion .accordion_item .accordion_text p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'accordion_text_margin',
			[
				'label' => esc_html__('Margin', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .contact-faq .faq_accordion .accordion_item .accordion_text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'accordion_cta_title',
			[
				'label' => __('CTA Title', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'accordion_cta_title_typography',
				'selector' => '{{WRAPPER}} .faq_bottom_cta h6',
			]
		);
		$this->add_control(
			'accordion_cta_title_color',
			[
				'label' => esc_html__('Title Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq_bottom_cta h6' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'accordion_cta_title_margin',
			[
				'label' => esc_html__('Margin', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .faq_bottom_cta h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$bottom_cta_title = $settings['bottom_cta_title'];
		$bottom_cta_button_text = $settings['bottom_cta_button_text'];
		$bottom_cta_button_link = $settings['bottom_cta_button_link'];

?>

		<!-- start: FAQ Section -->
		<section class="contact-faq bg-light-blue">
			<div class="container">
				<div class="contact_faq_container">
					<div class="row">
						<div class="col">
							<?php if (!empty($tj_section_title)) : ?>
								<div class="section_title">
									<h3><?php echo tj_kses($tj_section_title); ?></h3>
								</div>
							<?php endif; ?>
							<div class="faq_accordion" id="contactFaq-<?php echo esc_attr($this->get_id()); ?>">

								<?php foreach ($settings['accordions'] as $key => $item) : ?>

									<div class="accordion_item wow fadeInUp" data-wow-delay=".<?php echo esc_attr($key + 3) ?>s">
										<h6 class="accordion_title collapsed" data-bs-toggle="collapse" data-bs-target="#item-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($key + 1); ?>">
											<?php echo tj_kses($item['accordion_title']); ?>
										</h6>
										<div id="item-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($key + 1); ?>" class="accordion_text collapse" data-bs-parent="#contactFaq-<?php echo esc_attr($this->get_id()); ?>">
											<p><?php echo tj_kses($item['accordion_description']); ?></p>
										</div>
									</div>

								<?php endforeach; ?>

							</div>

							<?php if (!empty($bottom_cta_title || $bottom_cta_button_text)) : ?>
								<div class="faq_bottom_cta wow fadeInUp" data-wow-delay=".7s">
									<h6><?php echo tj_kses($bottom_cta_title); ?></h6>
									<a href="<?php echo esc_url($bottom_cta_button_link); ?>" class="btn"><?php echo tj_kses($bottom_cta_button_text); ?></a>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end: FAQ Section -->

<?php
	}
}

$widgets_manager->register(new TJ_FAQ());
