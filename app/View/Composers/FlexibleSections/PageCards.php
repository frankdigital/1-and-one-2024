<?php

namespace App\View\Composers\FlexibleSections;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class PageCards extends Composer {
    use UseHelpers;

	/**
     * Number of posts per page.
     *
     * @var int
     */
    const POSTS_PER_PAGE = 12;

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
        'flexible-sections.page-cards.page-cards',
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('section');
		$posts = [];

		$contentType = $this->pathOr('manual', ['content', 'content_type'], $section);

		if ($contentType === 'manual') {
			$posts = $section['content']['pages'] ?? [];
		} else if ($contentType === 'pages') {
			$posts = $section['content']['pages_automatic'] ?? [];
		}

		if (!empty($posts)) {
			$section['content']['pages'] = array_chunk($posts, self::POSTS_PER_PAGE);
		}

		return [
			'content' => $section['content'],
			'contentType' => $contentType,
			'columnsCount' => $this->pathOr('two_columns', ['content', 'columns'], $section),
		];
	}
}