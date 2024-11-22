<?php

/**
 * Generates a CSS class name based on the base class and optional child class.
 *
 * @param string $baseClass The base class name.
 * @param string|null $childClass The optional child class name.
 * @return string The generated CSS class name.
 */
if (!function_exists('ccn')) {
    function ccn($baseClass, $childClass = null) {
        return $childClass ? "jw-{$baseClass}__{$childClass}" : "jw-{$baseClass}";
    }
}

/**
 * Retrieves the image source URL for a given attachment ID.
 *
 * @param int $id The attachment ID.
 * @param string $size The image size. Default is 'full'.
 * @param bool $crop Whether to crop the image. Default is false.
 * @return array|false The image source URL as an array or false on failure.
 */
if (!function_exists('bis_get_image')) {
    function bis_get_image($id, $size = 'full', $crop = false) {
        return bis_get_attachment_image_src($id, $size, $crop);
    }
}

if (!function_exists('is_image_valid')) {
    function is_image_valid($image) {
        return $image && !empty($image['url']);
    }
}

if (!function_exists('build_button_from_link')) {
    function build_button_from_link($link, $label = 'Read More', $target = '_self') {
        return [
            'cta' => [
                "type" => "link",
                'url' => [
                    'url' => $link,
                    'title' => $label,
                    'target'=> $target
                ],
            ],
            'enable_cta' => true,
        ];
    }
}



/**
 * Checks if the CTA (Call to Action) is enabled.
 *
 * @param array $cta The CTA configuration.
 * @return bool Returns true if the CTA is enabled, false otherwise.
 */
if (!function_exists('is_cta_enabled')) {
    function is_cta_enabled($cta) {
        if (!isset($cta)) {
            return false;
        }
        
        if ($cta['enable_cta'] === false) {
            return false;
        } 

        return true;
    }
}