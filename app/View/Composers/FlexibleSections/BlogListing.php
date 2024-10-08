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
    const POSTS_PER_PAGE = 12;
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
        $posts = $section['content']['posts'];

        // Chunk posts into groups of POSTS_PER_PAGE
        $chunkedPosts = array_chunk($posts, self::POSTS_PER_PAGE);

        $section['content']['posts'] = $chunkedPosts;

		return [
			'content' => $section['content'],
		];
	}
}