<?php

namespace App\View\Composers\Heroes;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class SecondaryHero extends Composer {
    use UseHelpers;

	protected static $views = [
        'heroes.secondary.hero',
    ];

	public function with() {
		$section = $this->data->get('hero');

		return [
			'content' => $section,
		];
	}
}