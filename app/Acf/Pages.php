<?php
namespace App\Acf;

use App\Helpers\Helpers as Hlp;

/**
 * Class IconPickerConfig
 * 
 * This class is used to configure the Icon Picker plugin.
 */
class Pages {
    /**
     * Initialize the configuration for the Icon Picker plugin.
     * 
     * This method checks if the necessary plugins are active and then adds filters to modify their behavior.
     */
    public function init() {
        add_filter('acf/init', [$this, 'register_pages'], 10, 2);
    }

    public function register_pages() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' 	=> 'Options',
                'menu_title'	=> 'Options',
                'menu_slug' 	=> 'options',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));
    
            // acf_add_options_sub_page(array(
            //     'page_title' 	=> 'Search Modal Options',
            //     'menu_title'	=> 'Search Modal',
            //     'parent_slug'	=> 'theme-general-settings',
            //     'menu_slug' 	=> 'theme-search-modal-settings',
            // ));
    
            acf_add_options_sub_page(array(
                'page_title' 	=> 'Header Options',
                'menu_title'	=> 'Header',
                'parent_slug'	=> 'options',
                'menu_slug' 	=> 'options-header',
            ));
    
            acf_add_options_sub_page(array(
                'page_title' 	=> 'Footer Options',
                'menu_title'	=> 'Footer',
                'parent_slug'	=> 'options',
                'menu_slug' 	=> 'options-footer',
            ));
        }
    }
}

$class = new Pages();
$class->init();