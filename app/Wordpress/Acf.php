<?php

namespace App\Wordpress;

class Acf {
    public function init() {
        add_action('acf/init', [$this, 'register_google_map_api_key'], 10, 2);
        add_action('acf/save_post', [$this, 'update_hero_heading'], 10, 2);
        add_action('acf/save_post', [$this, 'update_featured_image_from_acf_hero_image'], 20 );
    }

    /**
     * Updates the post's featured image with the ACF 'hero_image' field value.
     *
     * This function hooks into the save process of a post and updates the post's
     * featured image (thumbnail) with the 'hero_image' field value from Advanced Custom Fields (ACF).
     *
     * @param int $post_id The ID of the post being saved.
     *
     * @return void
     */
    function update_featured_image_from_acf_hero_image( $post_id ) {
        if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
            return;
        }

        if ( get_post_type( $post_id ) !== 'post' ) {
            return;
        }

        if ( has_post_thumbnail( $post_id ) ) {
            return;
        }
    
        $hero_image_id = get_field('hero_image', $post_id);
    
        if ( $hero_image_id ) {
            // Update the post's featured image (thumbnail) with the 'hero_image'
            set_post_thumbnail( $post_id, $hero_image_id['ID'] );
        }
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