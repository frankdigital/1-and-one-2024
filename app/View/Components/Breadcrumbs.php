<?php

namespace App\View\Components;

use App\Traits\UseHelpers;
use Roots\Acorn\View\Component;

class Breadcrumbs extends Component {
	use UseHelpers;
	
	public $links = [];

	/**
	 * Create the component instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->setCustomBreadcrumbs();
	}

	/**
	 * Set custom breadcrumbs based on the current page.
	 *
	 * @return void
	 */
	private function setCustomBreadcrumbs() {
		global $post;

		if (is_single()) {
			$this->setPostBreadcrumbs($post);
		} elseif (is_page() && !is_front_page()) {
			$this->setPageBreadcrumbs($post);
		} elseif (is_category()) {
			$this->setCategoryBreadcrumbs();
		}
	}

	/**
	 * Set breadcrumbs for a single post.
	 *
	 * @param WP_Post $post
	 * @return void
	 */
	private function setPostBreadcrumbs($post) {
		$options = $this->getAcfFieldFromOptions('options_general_page_parent');
		$parent = $this->pathOr(null, ['post_page_parent'], $options);

		if (isset($parent) && $parent) {
			// Add the current category name
			$this->links[] = [
				'url' => get_the_permalink($parent),
				'label' => get_the_title($parent)
			];
		}

		$this->links[] = [
			'url' => null,
			'label' => get_the_title($post)
		];
	}

	/**
	 * Set breadcrumbs for a hierarchical page.
	 *
	 * @param WP_Post $post
	 * @return void
	 */
	private function setPageBreadcrumbs($post) {
		
		if ($post->post_parent) {
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			foreach ($ancestors as $ancestor) {
				$this->links[] = [
					'url' => get_permalink($ancestor),
					'label' => get_the_title($ancestor)
				];
			}
		}

		
		$this->links[] = [
			'url' => null,
			'label' => get_the_title($post)
		];
	}

	/**
	 * Set breadcrumbs for category archive pages.
	 *
	 * @return void
	 */
	private function setCategoryBreadcrumbs() {
		$category = get_queried_object();
		if ($category) {
			// Add parent categories if they exist
			if ($category->parent) {
				$ancestors = array_reverse(get_ancestors($category->term_id, 'category'));
				foreach ($ancestors as $ancestor_id) {
					$ancestor = get_category($ancestor_id);
					$this->links[] = [
						'url' => get_category_link($ancestor->term_id),
						'label' => $ancestor->name
					];
				}
			}

			// Add the current category name
			$this->links[] = [
				'url' => null,
				'label' => single_cat_title('', false)
			];
		}
	}


	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.breadcrumbs', ['links' => $this->links]);
	}
}