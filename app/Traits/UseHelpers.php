<?php

namespace App\Traits;

trait UseHelpers {
	/**
	 * Retrieves the value of an ACF field based on the field key and post ID.
	 *
	 * @param string $key The ACF field key.
	 * @param int $ID The post ID.
	 * @return mixed|null The value of the ACF field, or null if the field does not exist.
	 */
	public function getAcfFieldFromID($key, $ID) {
		if (function_exists('get_field')) {
			return \get_field($key, $ID);

			if (self::isNotEmpty($data)) {
				return $data;
			}
		}
		return null;
	}

	/**
	 * Retrieves the ACF field value from the options page.
	 *
	 * @param string $key The ACF field key.
	 * @return mixed The value of the ACF field.
	 */
	public function getAcfFieldFromOptions($key) {
		return self::getAcfFieldFromID($key, 'options');
	}

	
	/**
	 * Retrieves the value of an ACF field from a specific term.
	 *
	 * @param string $key The ACF field key.
	 * @param string $taxonomyName The name of the taxonomy.
	 * @param int $termId The ID of the term.
	 * @return mixed|null The value of the ACF field, or null if the function does not exist.
	 */
	public function getAcfFieldFromTerm($key, $taxonomyName, $termId) {
		if (function_exists('get_field')) {
			return \get_field($key, $taxonomyName . '_' . $termId);
		}
	}

	/**
	 * Check if an array is not empty and has values.
	 *
	 * @param array $array The array to check.
	 * @return bool Returns true if the array is not empty and has values, false otherwise.
	 */
	public function isArrayWithValue($array) {
		return isset($array) && is_array($array) && sizeof($array);
	}

	/**
	 * Check if a value is not empty.
	 *
	 * @param mixed $value The value to check.
	 * @return bool Returns true if the value is not empty, false otherwise.
	 */
	public function isNotEmpty($value) {
		return isset($value) && !empty($value);
	}

	/**
	 * Retrieves a value from a nested array using a given path, or returns a default value if the path does not exist.
	 *
	 * @param mixed $default The default value to return if the path does not exist.
	 * @param array $path The path to the desired value within the nested array.
	 * @param array $source The nested array to retrieve the value from.
	 * @return mixed The value at the specified path, or the default value if the path does not exist.
	 * @throws \Exception If the path is not an array.
	 */
	public function pathOr($default, $path, $source) {
		if (!is_array($path) || !sizeof($path)) {
			throw new \Exception('Path must be an array');
		}
		$value = $source;
		foreach ($path as $item) {
			if (isset($value, $value[$item])) {
				$value = $value[$item];
			} else {
				return $default;
			}
		}

		return !empty($value) ? $value : $default;
	}

	/**
	 * Format a given date and time string according to the specified format.
	 *
	 * @param string $dateTime The date and time string to format.
	 * @param string $format   (Optional) The format to use for the formatted date and time. Default is 'Y-m-d H:i:s'.
	 *
	 * @return string The formatted date and time string.
	 */
	public function formatDate($dateTime, $format = 'Y-m-d H:i:s') {
		$dateTime = new \DateTime($dateTime);
		// Set the timezone for the DateTime object
		$timezone = new \DateTimeZone('Australia/Sydney');
		$dateTime->setTimezone($timezone);

		return $dateTime->format($format);
	}

	/**
	 * Truncates a string to a specified number of characters and adds an optional replacement if the string is longer than the specified length.
	 *
	 * @param string $str The string to truncate.
	 * @param int $chars The maximum number of characters to keep.
	 * @param bool $to_space Whether to truncate the string to the last space character.
	 * @param string $replacement The replacement string to append if the string is truncated.
	 * @return string The truncated string.
	 */
	function truncateString($str, $chars, $to_space, $replacement = '...') {
		if ($chars > strlen($str)) {
			return $str;
		}

		$str = substr($str, 0, $chars);
		$space_pos = strrpos($str, ' ');
		if ($to_space && $space_pos >= 0) {
			$str = substr($str, 0, strrpos($str, ' '));
		}

		return $str . $replacement;
	}

	/**
	 * Converts a string to camel case.
	 *
	 * @param string $string The input string to be converted.
	 * @return string The camel case version of the input string.
	 */
	protected function toCamelCase($string) {
		return $this->camelize($this->camelize($string), '-');
	}

	/**
	 * Converts a string to camel case.
	 *
	 * @param string $input The input string to be converted.
	 * @param string $separator The separator used in the input string.
	 * @return string The camel case version of the input string.
	 */
	protected function camelize($input, $separator = '_') {
		return str_replace($separator, '', ucwords($input, $separator));
	}

	/**
	 * Retrieves the fallback image from the options.
	 *
	 * @return string|null The fallback image path or null if not found.
	 */
	protected function getFallbackImage() {
		$data = $this->getAcfFieldFromOptions('general');

		return $this->pathOr(null, ['image_default'], $data);
	}

	/**
     * Generates a CSS class name based on the base class and optional child class.
     *
     * @param string $baseClass The base class name.
     * @param string|null $childClass The optional child class name.
     * @return string The generated CSS class name.
     */
    public function ccn($baseClass, $childClass = null) {
        return $childClass ? "jw-{$baseClass}__{$childClass}" : "jw-{$baseClass}";
    }

	public function isCtaEnabled($cta) {
		return is_cta_enabled($cta);
	}

	/**
	 * Wraps a link with a supporting array to allow to be passed straight to the `<x-button />` component
	 *
	 * @param string $link The URL that the button will link to
	 * @param string|null $label The text that will be displayed on the button
	 *
	 * @return Array
	 */

	public function buildButtonFromLink(
		$link,
		$label = 'Read More',
		$target = '_self',
	) {
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

	/**
	 * Takes a media item ID and returns an array that can be passed to the `<x-image />` component.
	 *
	 * @param int $ID The media item ID.
	 *
	 * @return array|null
	 */
	public function buildImageFromId(int $ID): ?array {
		if (!$ID) {
			return null;
		}

		$url = wp_get_attachment_url($ID);
		$title = get_the_title($ID);
		$alt = get_post_meta($ID, '_wp_attachment_image_alt', true);

		return [
			'ID'    => $ID,
			'url'   => $url,
			'title' => $title,
			'alt'   => $alt,
		];
	}
}