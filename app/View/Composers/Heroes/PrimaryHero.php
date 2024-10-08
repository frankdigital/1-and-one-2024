<?php

namespace App\View\Composers\Heroes;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class PrimaryHero extends Composer {
    use UseHelpers;

	protected static $views = [
        'heroes.primary.left',
        'heroes.primary.split', 
        'heroes.primary.stacked',
        'heroes.primary.standard',
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('hero');

		return [
			'content' => $section,
		];
	}
}