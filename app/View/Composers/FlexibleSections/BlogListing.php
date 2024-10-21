<?php

namespace App\View\Composers\FlexibleSections;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class BlogListing extends Composer {
    use UseHelpers;

    /**
     * Number of posts per page.
     *
     * @var int
     */
    const POSTS_PER_PAGE = 3;
	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
		'flexible-sections.blog-listing.blog-listing-standard',
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('section');
		$contentType = $this->pathOr(true, ['content', 'content_type'], $section);
		$posts = [];
	
		if ($contentType === 'curated') {
			$posts = $section['content']['posts'] ?? [];
		} elseif ($contentType === 'automatic') {
			$args = [
				'numberposts' => -1,
				'post_type'   => 'post',
				'post_status' => 'publish',
			];
			$posts = get_posts($args);
		}
	
		if (!empty($posts)) {
			$section['content']['posts'] = array_chunk($posts, self::POSTS_PER_PAGE);
		}

		return [
			'content' => $section['content'],
			'columnsCount' => $this->pathOr('three_columns', ['content', 'columns'], $section),
			'darkerBg' => $this->pathOr('lighter', ['content', 'bg_color'], $section) === 'darker',
		];
	}
}