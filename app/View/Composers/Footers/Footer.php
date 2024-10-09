<?php

namespace App\View\Composers\Footers;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class Footer extends Composer {
    use UseHelpers;

	protected static $views = [
        'footers.footer',
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('footer');

		return [
			'cta' => $this->pathOr([], ['footer', 'content'], $section),
			'socials' => $this->getSocials($section),
            'locations' => $this->pathOr([], ['footer', 'locations'], $section),
            'featured_links' => $this->pathOr([], ['footer', 'featured_links'], $section),
            'legal_links' => $this->pathOr([], ['footer', 'links'], $section),
		];
	}

	public function getSocials($section) {
		$socials = $this->pathOr([], ['socials'], $section);
		
		return collect($socials)->map(function($social) {
			return $social;
		})->toArray();
	}
}