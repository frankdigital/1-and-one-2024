<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;
use App\Traits\UseHelpers;

class FrontPage extends Composer {
    use AcfFields;
	use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = ['template-front-page'];

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
	 * Returns the site name.
	 *
	 * @return string
	 */
	public function siteName() {
		return get_bloginfo('name', 'display');
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
		$optionsGeneral = $this->getAcfFieldFromOptions('options_general_socials');
		$optionsFooter = $this->getAcfFieldFromOptions('options_footer');

		$mergedArray = array_merge($optionsGeneral, $optionsFooter);

        return [
			'socials' => $optionsGeneral,
			'footer' => $optionsFooter,
		];
	}
}