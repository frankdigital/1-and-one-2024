<?php

namespace App\View\Composers\FlexibleSections;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class ContentTiles extends Composer {
    use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
		'flexible-sections.content-tiles.content-tiles-default'
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('section');

		return [
			'content' => $section['content'],
		];
	}
}