<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Breadcrumbs extends Component {
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
		$categories = get_the_category($post->ID);
		if (!empty($categories)) {
		
			$category = $categories[0];
			$this->links[] = [
				'url' => get_category_link($category->term_id),
				'label' => $category->name
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