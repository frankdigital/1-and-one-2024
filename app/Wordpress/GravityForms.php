<?php
namespace App\Wordpress;

/**
 * Class GravityFormsConfig
 * 
 * This class is used to configure the Icon Picker plugin.
 */
class GravityForms {
	/**
	 * Initialize the configuration for the Icon Picker plugin.
	 * 
	 * This method checks if the necessary plugins are active and then adds filters to modify their behavior.
	 */
	public function init() {
		if (
			is_plugin_active('gravityforms/gravityforms.php')
		) {
			add_filter('gform_submit_button', [$this, 'input_to_button'], 10, 2);
			add_filter( 'gform_form_args', [$this, 'force_ajax_submission'], 10, 2);
		}
	}

	/**
	 * Force Gravity Forms to submit via AJAX.
	 *
	 * @param array $args The form arguments.
	 * @param array $form The form data.
	 * @return array Modified form arguments.
	 */
	public function force_ajax_submission( $args ) {
		$args['ajax'] = true;
 
		return $args;
	}

	/**
	 * Modify the submit button to convert it to a button tag and include an SVG icon.
	 *
	 * @param string $button The original button HTML.
	 * @param array $form The form data.
	 * @return string Modified button HTML.
	 */
	public function input_to_button( $button, $form ) {
		// Load the SVG icon content
		$svg_icon = $this->get_svg_icon();

		

		// Use WP_HTML_Processor to modify the button
		$fragment = \WP_HTML_Processor::create_fragment( $button );
		$fragment->next_token();

		// Collect button attributes
		$attributes = array( 'id', 'type', 'class', 'onclick' );
		$new_attributes = array();
		foreach ( $attributes as $attribute ) {
			$value = $fragment->get_attribute( $attribute );
			if ( ! empty( $value ) ) {
				$new_attributes[] = sprintf( '%s="%s"', $attribute, esc_attr( $value ) );
			}
		}

		// Build the new button with the SVG wrapped in a span
		return sprintf(
			'<button %s>
				<span class="">%s</span>
				<span class="cta-contained__icon cta-contained__icon--primary cta-contained__icon--default">
					<span class="jw-icon-handler">
						%s
					</span>
				</span>
			</button>',
			implode( ' ', $new_attributes ),
			esc_html( $fragment->get_attribute( 'value' ) ), // Button text
			$svg_icon, // The SVG icon
		);
	}

	/**
	 * Retrieve the SVG icon content from a file.
	 *
	 * @return string The SVG icon content.
	 */
	public function get_svg_icon() {
		// Path to the SVG file
		$svg_path = get_template_directory() . '/resources/icons/common/ArrowRight.svg';

		// Return the SVG content or an empty string if the file is not found
		if ( file_exists( $svg_path ) ) {
			return file_get_contents( $svg_path );
		}

		return '';
	}
}

$class = new GravityForms();
$class->init();