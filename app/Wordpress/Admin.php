<?php
namespace App\Wordpress;


class Admin {
    public function init() {
        add_filter('admin_post_thumbnail_html', [$this, 'update_featured_image_label'], 10, 2);
    }

    public function update_featured_image_label($content) {
        global $pagenow;
        
        $isNewFoo = 'post-new.php' === $pagenow && isset($_GET['post_type']) && $_GET['post_type'] === 'foo';
        $isEditFoo = 'team.php' === $pagenow && isset($_GET['post']) && get_post_type($_GET['post']) === 'team';

        if (get_post_type($_GET['post']) === 'team') {
            return '<p>' . __('Recommended retina image size: 818px x 820px') . '</p>' . $content;
        }

        return $content;
    }
}

$class = new Admin();
$class->init();