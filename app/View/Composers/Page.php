<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;
use App\Traits\UseHelpers;

class Page extends Composer {
    use AcfFields;
	use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = ['page'];

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
		
		if ($this->getAcfFieldFromOptions('options_general_enable_global_content_tiles')) {
			$contentTilesGlobal = $this->getAcfFieldFromOptions('options_general_content');
			$pagesToDisplayGlobalContentTiles = $this->getAcfFieldFromOptions('options_general_global_content_tiles') ?? [];

			if (!empty($pagesToDisplayGlobalContentTiles) && in_array(get_the_ID(), $pagesToDisplayGlobalContentTiles ?? [])) {
				$position = max(0, count($data) - 2);
				$globalContent = [
					'acf_fc_layout' => 'content_tiles',
					'scroll_id' => 'global-content-tiles',
					'content' => $contentTilesGlobal
				];
				
				array_splice($data, $position, 0, [$globalContent]);
			}
		}
	
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