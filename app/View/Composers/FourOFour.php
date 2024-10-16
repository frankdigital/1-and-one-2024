<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;
use App\Traits\UseHelpers;

class FourOFour extends Composer {
    use AcfFields;
	use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = ['404'];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		return [
			'hero' => $this->hero(),
			'footer' => $this->footer(),
			'cta' => $this->buildButtonFromLink('/', 'Take me home'),
		];
	}

	/**
	 * Returns the site name.
	 *
	 * @return string
	 */
	public function siteName() {
		return get_bloginfo('name', 'display');
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