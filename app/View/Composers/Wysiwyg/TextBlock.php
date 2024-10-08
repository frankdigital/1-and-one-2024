<?php

namespace App\View\Composers\Wysiwyg;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class TextBlock extends Composer {
	use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = ['partials.wysiwyg.text_block'];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('section');
		return [
			'block' => $section,
		];
	}
}