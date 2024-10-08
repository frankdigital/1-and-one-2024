<?php

namespace App\Wordpress;

class Acf {
    public function init() {
        add_action('acf/init', [$this, 'register_google_map_api_key'], 10, 2);
        add_action('acf/save_post', [$this, 'update_hero_heading'], 10, 2);
    }

    /**
     * Update the hero heading field of a post or page.
     *
     * This method checks if the post type is either 'page' or 'post'. If it is, it retrieves the 'hero' field
     * from the post. If the 'heading' subfield of the 'hero' field is empty, it updates the 'hero_heading' field
     * with the title of the post.
     *
     * @param int $post_id The ID of the post.
    */
    public function update_hero_heading($post_id) {
        $postTypes = ['page', 'post'];

        if (!in_array(get_post_type($post_id), $postTypes)) {
            return;
        }

        $hero = get_field('hero', $post_id);

        if (empty($hero['heading'])) {
            $title = get_the_title($post_id);

            update_field('hero_heading', $title, $post_id);
        }
    }

    /**
     * Register the Google Maps API key.
     *
     * This method registers the Google Maps API key with ACF.
     */

    public function register_google_map_api_key() {
        acf_update_setting('google_api_key', '');
    }

}

$class = new Acf();
$class->init();