<?php
namespace App\Wordpress;

/**
 * Class IconPickerConfig
 * 
 * This class is used to configure the Icon Picker plugin.
 */
class IconPicker {
    /**
     * Initialize the configuration for the Icon Picker plugin.
     * 
     * This method checks if the necessary plugins are active and then adds filters to modify their behavior.
     */
    public function init() {
        if (
            is_plugin_active('acf-icon-picker-master/acf-icon-picker.php') && 
            is_plugin_active('advanced-custom-fields-pro/acf.php')
        ) {
            add_filter('acf_icon_path_suffix', [$this, 'define_acf_icon_path_suffix'], 10, 2);
            add_filter('acf_icon_path', [$this, 'define_acf_icon_path'], 10, 2);
            add_filter('acf_icon_url', [$this, 'define_acf_icon_url'], 10, 2);
        }
    }

    /**
     * Define the path suffix for the ACF Icon Picker plugin.
     * 
     * @return string The path suffix.
     */
    public function define_acf_icon_path_suffix() {
        return 'resources/icons/common/';
    }

    /**
     * Define the URL for the ACF Icon Picker plugin.
     * 
     * @return string The URL.
     */
    public function define_acf_icon_url() {
        return get_template_directory_uri() . '\/icons/';
    }

    /**
     * Define the path for the ACF Icon Picker plugin.
     * 
     * @return string The path.
     */
    public function define_acf_icon_path() {
        return plugin_dir_path( __FILE__ );
    }
}

$class = new IconPicker();
$class->init();