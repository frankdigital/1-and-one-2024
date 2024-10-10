<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;
use App\Traits\UseHelpers;

class Post extends Composer {
    use AcfFields;
	use UseHelpers;

	protected static $views = ['single-post'];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		return [
			'flexibleSections' => $this->flexibleSections(),
			'hero' => $this->hero(),
			'footer' => $this->footer(),
		];
	}

	/**
	 * Returns the ACF Flexible section on the template.
	 *
	 * @return string
	 */
	public function flexibleSections() {
		$data = get_field('flexible_sections') ?? [];

        return $data;
	}

	public function header() {
		$optionsHeader = $this->getAcfFieldFromOptions('options_header');

		return $optionsHeader;
	}


		/**
	 * Returns the ACF Flexible section on the template.
	 *
	 * @return string
	 */
	public function hero() {
		$data = get_field('hero') ?? [];

        

        return $data;
	}

	/**		
	 * Returns the ACF Flexible section on the template.
	 *
	 * @return string
	 */
	public function footer() {
		$optionsGeneral = $this->getAcfFieldFromOptions('options_general_socials') ?? [];
		$optionsFooter = $this->getAcfFieldFromOptions('options_footer') ??  [];

		$mergedArray = array_merge($optionsGeneral, $optionsFooter);

        return [
			'socials' => $optionsGeneral,
			'footer' => $optionsFooter,
		];
	}
}