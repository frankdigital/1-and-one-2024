<?php

namespace App\View\Composers\FlexibleSections;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class ContactForm extends Composer {
    use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
        'flexible-sections.contact-form.contact-form-default'
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('section');
		$contact = $this->getAcfFieldFromOptions('options_general_contact');
		$socials = $this->getAcfFieldFromOptions('options_general_socials');

		return [
			'content' => $section['content'],
			'scrollId' => $this->pathOr(null, ['scroll_id'], $section),
			'socials' => $socials,
			'email' => $this->pathOr(null, ['email'], $contact),
			'address' => $this->getLocationAddress($contact['location']),
			'telephone' => $this->pathOr(null, ['phone'], $contact),
		];
	}

    /**
     * Get the location address, allowing for override if set
     *
     * @return string|null
     */
    public function getLocationAddress($location) {
        $isOverridden = $location['toggle_override_google_address'];
        $overriddenAddress = $location['override_google_address'];

        // Return overridden address if set and not empty
        if ($isOverridden && $this->isNotEmpty($overriddenAddress)) {
            return $overriddenAddress;
        }

        // Fallback to Google Maps address
        $googleMaps = $location['google_map_data'];
        return $this->pathOr(null, ['street_address'], $googleMaps);
    }
}