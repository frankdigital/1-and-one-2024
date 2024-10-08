<?php

namespace App\View\Composers\FlexibleSections;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class FaqStandard extends Composer {
    use UseHelpers;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
		'flexible-sections.faq.faq-standard',
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
			'faqs' => $this->getFaqData($section['content']['faqs']),
		];
	}

	protected function getFaqData($data) {
		if (
			$data &&
			self::isNotEmpty($data) &&
			self::isArrayWithValue($data)
		) {
			return array_map([$this, 'getData'], $data);
		}

		return null;
	}

	protected function getData($data) {
		return [
			'question' => get_the_title($data->ID),
			'answer' => $this->pathOr(null, ['answer'], $this->getAcfFieldFromID('post_type_data', $data->ID)),
		];
	}
}