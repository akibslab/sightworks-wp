<?php

if (!defined('ABSPATH')) {
    exit;
}

class TJ_OCDI_Demo_Importer {

    public function __construct() {
        add_filter('pt-ocdi/import_files', [$this, 'import_files_config']);
        add_filter('pt-ocdi/after_import', [$this, 'ocdi_after_import_setup']);
        add_filter('pt-ocdi/disable_pt_branding', '__return_true');
        add_action('init', [$this, 'tj_ocdi_rewrite_flush']);
    }

    public function import_files_config() {

        $home_prevs = array(
            'tj_demo_home_1' => array(
                'title' => __('Home 1', 'tjcore'),
                'page'  => __('home', 'tjcore'),
                'screenshot' => plugins_url('assets/img/demo/home1.jpg', dirname(__FILE__)),
                'preview_link' => 'https://themepure.net/wp/gainioz/',
            ),
            'tj_demo_home_2' => array(
                'title' => __('Home 2', 'tjcore'),
                'page'  => __('home-02', 'tjcore'),
                'screenshot' => plugins_url('assets/img/demo/home2.jpg', dirname(__FILE__)),
                'preview_link' => 'https://themepure.net/wp/gainioz/home-02/',
            ),
            'tj_demo_home_3' => array(
                'title' => __('Home 3', 'tjcore'),
                'page'  => __('home-03', 'tjcore'),
                'screenshot' => plugins_url('assets/img/demo/home3.jpg', dirname(__FILE__)),
                'preview_link' => 'https://themepure.net/wp/gainioz/home-03/',
            ),
        );

        $config = [];

        $import_path = trailingslashit(get_template_directory()) . 'sample-data/';

        foreach ($home_prevs as $key => $prev) {

            $contents_demo = $import_path . 'contents-demo.xml';
            $widget_settings = $import_path . 'widget-settings.json';
            $customizer_data = $import_path . 'customizer-data.dat';

            $config[] = [
                'import_file_id'               => $key,
                'import_page_name'             => $prev['page'],
                'import_file_name'             => $prev['title'],
                'local_import_file'            => $contents_demo,
                'local_import_widget_file'     => $widget_settings,
                'local_import_customizer_file' => $customizer_data,
                'import_preview_image_url'     => $prev['screenshot'],
                'preview_url'                  => $prev['preview_link'],
                'import_notice'                => esc_html__('After you import this demo, you will have to setup the slider separately.', 'tjcore'),
            ];
        }

        return $config;
    }

    public function ocdi_after_import_setup($selected_file) {

        $this->assign_menu_to_location();
        $this->assign_frontjage_id($selected_file);
        $this->update_permalinks();
        update_option('basa_ocdi_importer_flash', true);
    }

    private function assign_menu_to_location() {

        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', [
            'main-menu' => $main_menu->term_id,
        ]);
    }

    private function assign_frontjage_id($selected_import) {

        $front_page = get_page_by_title($selected_import['import_page_name']);
        $blog_page = get_page_by_title('Blog');

        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page->ID);
        update_option('page_for_posts', $blog_page->ID);
    }

    private function update_permalinks() {
        update_option('permalink_structure', '/%postname%/');
    }

    public function tj_ocdi_rewrite_flush() {

        if (get_option('basa_ocdi_importer_flash') == true) {
            flush_rewrite_rules();
            delete_option('basa_ocdi_importer_flash');
        }
    }
}

new TJ_OCDI_Demo_Importer;
