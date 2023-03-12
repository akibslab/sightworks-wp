<?php

/**
 * sightworks customizer
 *
 * @package sightworks
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Added Panels & Sections
 */
function sightworks_customizer_panels_sections($wp_customize) {

  //Add panel
  $wp_customize->add_panel('sightworks_customizer', [
    'priority' => 10,
    'title'    => esc_html__('Sightworks Customizer', 'sightworks'),
  ]);

  /**
   * Customizer Section
   * 
   * General
   */
  // $wp_customize->add_section('sightworks_theme_general_settings', [
  //   'title'       => esc_html__('General', 'sightworks'),
  //   'description' => '',
  //   'priority'    => 10,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'sightworks_customizer',
  // ]);
  // Logos & Favicon
  $wp_customize->add_section('sightworks_theme_logos_favicon', [
    'title'       => esc_html__('Logos & Favicon', 'sightworks'),
    'description' => '',
    'priority'    => 11,
    'capability'  => 'edit_theme_options',
    'panel'       => 'sightworks_customizer',
  ]);
  // Header Top Bars
  // $wp_customize->add_section('header_top_bar', [
  //   'title'       => esc_html__('Header Top Bar', 'sightworks'),
  //   'description' => '',
  //   'priority'    => 12,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'sightworks_customizer',
  // ]);
  // Header Settings
  $wp_customize->add_section('header_settings', [
    'title'       => esc_html__('Header Setting', 'sightworks'),
    'description' => '',
    'priority'    => 12,
    'capability'  => 'edit_theme_options',
    'panel'       => 'sightworks_customizer',
  ]);
  // Breadcrumb Settings
  // $wp_customize->add_section('breadcrumb_setting', [
  //   'title'       => esc_html__('Breadcrumb Setting', 'sightworks'),
  //   'priority'    => 15,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'sightworks_customizer',
  // ]);
  // $wp_customize->add_section('blog_setting', [
  //   'title'       => esc_html__('Blog Setting', 'sightworks'),
  //   'description' => '',
  //   'priority'    => 15,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'sightworks_customizer',
  // ]);
  $wp_customize->add_section('footer_setting', [
    'title'       => esc_html__('Footer Settings', 'sightworks'),
    'description' => '',
    'priority'    => 16,
    'capability'  => 'edit_theme_options',
    'panel'       => 'sightworks_customizer',
  ]);
  $wp_customize->add_section('404_page', [
    'title'       => esc_html__('404 Page', 'sightworks'),
    'description' => '',
    'priority'    => 18,
    'capability'  => 'edit_theme_options',
    'panel'       => 'sightworks_customizer',
  ]);
  $wp_customize->add_section('typo_setting', [
    'title'       => esc_html__('Typography Setting', 'sightworks'),
    'description' => '',
    'priority'    => 21,
    'capability'  => 'edit_theme_options',
    'panel'       => 'sightworks_customizer',
  ]);
}
add_action('customize_register', 'sightworks_customizer_panels_sections');


/************************************ Customizer Fields *********************************
 * 
 * General Settings
 */
function _theme_general_settings_fields($fields) {
  // preloader
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'sightworks_preloader',
    'label'    => esc_html__('Preloader?', 'sightworks'),
    'description' => esc_html__('Show preloader.', 'sightworks'),
    'section'  => 'sightworks_theme_general_settings',
    'default'  => '0',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'sightworks'),
      'off' => esc_html__('Disable', 'sightworks'),
    ],
  ];

  // backToTop
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'sightworks_backtotop',
    'label'    => esc_html__('Back to Top', 'sightworks'),
    'description'    => esc_html__('Show back to top button', 'sightworks'),
    'section'  => 'sightworks_theme_general_settings',
    'default'  => '0',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'sightworks'),
      'off' => esc_html__('Disable', 'sightworks'),
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_theme_general_settings_fields');

// logos & favicon fields
function _theme_logos_favicon_fields($fields) {
  // primary logo
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'site_logo',
    'label'       => esc_html__('Site Logo', 'sightworks'),
    'description' => esc_html__('Upload Your Logo.', 'sightworks'),
    'section'     => 'sightworks_theme_logos_favicon',
    'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
  ];
  // preloader logo
  // $fields[] = [
  //   'type'        => 'image',
  //   'settings'    => 'preloader_logo',
  //   'label'       => esc_html__('Preloader Logo', 'sightworks'),
  //   'description' => esc_html__('Upload Preloader Logo.', 'sightworks'),
  //   'section'     => 'sightworks_theme_logos_favicon',
  //   'default'     => get_template_directory_uri() . '/assets/img/preloader.svg',
  // ];

  return $fields;
}
add_filter('kirki/fields', '_theme_logos_favicon_fields');

// Header Settings
function _header_setting_fields($fields) {
  // header right
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'header_right_button',
    'label'    => esc_html__('Header Right Button', 'sightworks'),
    'description'    => esc_html__('Show header right button.', 'sightworks'),
    'section'  => 'header_settings',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'sightworks'),
      'off' => esc_html__('Disable', 'sightworks'),
    ],
  ];
  // right button text
  $fields[] = [
    'type'     => 'text',
    'settings' => 'header_right_button_text',
    'label'    => esc_html__('Button Text', 'sightworks'),
    'section'  => 'header_settings',
    'default'  => esc_html__('Termin vereinbaren', 'sightworks'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'header_right_button',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // right button link
  $fields[] = [
    'type'     => 'link',
    'settings' => 'header_right_button_link',
    'label'    => esc_html__('Button Link', 'sightworks'),
    'section'  => 'header_settings',
    'default'  => esc_html__('#', 'sightworks'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'header_right_button',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_header_setting_fields');


/*
Footer
*/
function _footer_setting_fields($fields) {
  // footer logo
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'footer_logo',
    'label'       => esc_html__('Footer Logo', 'sightworks'),
    'description' => esc_html__('This image will be show footer logo.', 'sightworks'),
    'section'     => 'footer_setting',
    'default'     => get_template_directory_uri() . '/assets/img/logo/footer-logo.png',
    'priority' => 10,
  ];
  // footer info
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_info',
    'label'    => esc_html__('Footer Info', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('Studio für Design Andrea Lechler', 'sightworks'),
    'priority' => 11,
  ];
  // footer address
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_address',
    'label'    => esc_html__('Footer Address', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('22607 Hamburg Deutschland', 'sightworks'),
    'priority' => 12,
  ];
  // footer phone
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_phone',
    'label'    => esc_html__('Footer Phone', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('+49 (0) 40 4145 6068', 'sightworks'),
    'priority' => 13,
  ];
  // mobile AGBs Link
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_agbs_link',
    'label'    => esc_html__('Mobile AGBs Link', 'sightworks'),
    'section'  => 'footer_setting',
    'priority' => 13,
  ];
  // footer socials
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'footer_social_switcher',
    'label'    => esc_html__('Socials', 'sightworks'),
    'description'    => esc_html__('Show footer socials.', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => '1',
    'priority' => 14,
    'choices'  => [
      'on'  => esc_html__('Enable', 'sightworks'),
      'off' => esc_html__('Disable', 'sightworks'),
    ],
  ];
  // email
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_email_link',
    'label'    => esc_html__('Email', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('anfrage@sightworks.de', 'sightworks'),
    'priority' => 15,
    'active_callback' => [
      [
        'setting'  => 'footer_social_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // linkedin
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_linkedin_link',
    'label'    => esc_html__('Linkedin Link', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('https://www.linkedin.com/in/andrea-lechler-a3a61067/', 'sightworks'),
    'priority' => 16,
    'active_callback' => [
      [
        'setting'  => 'footer_social_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // instagram
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_instagram_link',
    'label'    => esc_html__('Instagram Link', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('https://www.instagram.com/sightworks_designstudio/', 'sightworks'),
    'priority' => 17,
    'active_callback' => [
      [
        'setting'  => 'footer_social_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // facebook
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_fb_link',
    'label'    => esc_html__('Facebook Link', 'sightworks'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('https://www.facebook.com/profile.php?id=100089911721876', 'sightworks'),
    'priority' => 18,
    'active_callback' => [
      [
        'setting'  => 'footer_social_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  return $fields;
}
add_filter('kirki/fields', '_footer_setting_fields');


// 404
function sightworks_404_fields($fields) {
  // 404 settings
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'sightworks_404_bg',
    'label'       => esc_html__('404 Image.', 'sightworks'),
    'description' => esc_html__('404 Image.', 'sightworks'),
    'section'     => '404_page',
    'default'     => get_template_directory_uri() . '/assets/img/error/error.png',
  ];
  $fields[] = [
    'type'     => 'text',
    'settings' => 'sightworks_error_title',
    'label'    => esc_html__('Not Found Title', 'sightworks'),
    'section'  => '404_page',
    'default'  => esc_html__('Page not found', 'sightworks'),
    'priority' => 10,
  ];
  $fields[] = [
    'type'     => 'textarea',
    'settings' => 'sightworks_error_desc',
    'label'    => esc_html__('404 Description Text', 'sightworks'),
    'section'  => '404_page',
    'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'sightworks'),
    'priority' => 10,
  ];
  $fields[] = [
    'type'     => 'text',
    'settings' => 'sightworks_error_link_text',
    'label'    => esc_html__('404 Link Text', 'sightworks'),
    'section'  => '404_page',
    'default'  => esc_html__('Back To Home', 'sightworks'),
    'priority' => 10,
  ];
  return $fields;
}
add_filter('kirki/fields', 'sightworks_404_fields');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function Sightworks_Theme_option($name) {
  $value = '';
  if (class_exists('sightworks')) {
    $value = Kirki::get_option(sightworks_get_theme(), $name);
  }

  return apply_filters('Sightworks_Theme_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function sightworks_get_theme() {
  return 'sightworks';
}
