<?php
namespace App\Wordpress;

use App\Helpers\Helpers as Hlp;

/**
 * Class IconPickerConfig
 * 
 * This class is used to configure the Icon Picker plugin.
 */
class Fonts {
    /**
     * Initialize the configuration for the Icon Picker plugin.
     * 
     * This method checks if the necessary plugins are active and then adds filters to modify their behavior.
     */
    public function init() {
        add_filter('wp_enqueue_scripts', [$this, 'enqueue_google_font'], 10, 2);
    }

    /**
     * Define the path suffix for the ACF Icon Picker plugin.
     * 
     * @return string The path suffix.
     */
    public function enqueue_google_font() {
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap', false );
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

$class = new Fonts();
$class->init();