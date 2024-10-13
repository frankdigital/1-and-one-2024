<?php

namespace App\View\Composers\FlexibleSections;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class LocationsTabbed extends Composer {
    use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
        'flexible-sections.locations.locations-tabbed',
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('section');
		$customSelection = $this->pathOr(false, ['content', 'custom_locations_select'], $section);
		$locations = $customSelection ? $this->pathOr([], ['content', 'locations'], $section) : $this->getLocations();
		
		
		return [
			'content' => $section['content'],
			'locations' => $locations,
			'darkerBg' => $this->pathOr('lighter', ['content', 'bg_color'], $section) === 'darker',
		];
	}

	public function getLocations() {
		$args = array(
			'post_type' => 'location',
			'posts_per_page' => -1,
			'return' => 'ids',
		);
		$query = new \WP_Query($args);
		return $query->posts;
	}
}