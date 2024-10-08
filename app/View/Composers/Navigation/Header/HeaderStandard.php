<?php

namespace App\View\Composers\Navigation\Header;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class HeaderStandard extends Composer {
    use UseHelpers;

	protected static $views = [
        'navigation.header.standard',
    ];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		$section = $this->data->get('header');

		return [
			'content' => [
				'smallLinks' => $this->pathOr($section, ['links'], $section),
				'primary_cta' => $this->pathOr($section, ['header', 'primary_cta'], $section),
				'secondary_cta' => $this->pathOr($section, ['header','secondary_cta'], $section),
				'menu' => $this->getPrimaryNavigation(),
			]
		];
	}

	/**
	 * Returns the primary navigation.
	 *
	 * @return array
	 */
	public function getPrimaryNavigation() {
		$menu_name = 'primary_navigation';
		$locations = get_nav_menu_locations();

		if (isset($locations[$menu_name])) {
			$menu_id = $locations[$menu_name];
			$menu_items = wp_get_nav_menu_items($menu_id);

			if ($menu_items) {
				$menu_tree = [];
				$menu_map = [];

				foreach ($menu_items as $item) {
					$jwNavIcon = $this->getAcfFieldFromID('icon', $item);

					// Fetch ACF fields for each menu item
					$jwNavEnableExcerpt = $this->getAcfFieldFromID('enable_excerpt', $item);
					$jwNavExcerpt = $this->getAcfFieldFromID('excerpt', $item);

					$jwNavEnableFeatured = $this->getAcfFieldFromID('enable_featured', $item);
					$jwNavFeatured = $this->getAcfFieldFromID('featured', $item);

					// Compile all necessary data including ACF fields
					$menu_map[$item->ID] = [
						'uri' => $item->url,
						'label' => $item->title,
						'excerpt' => $jwNavEnableExcerpt ? $jwNavExcerpt : null,
						'icon' => $jwNavIcon,
						'featured' => $jwNavEnableFeatured ?  $jwNavFeatured : null,
						'children' => [] // Prepare for children to be added later
					];
				}

				// Build the menu tree by setting up parent-child relationships
				foreach ($menu_items as $item) {
					if (!$item->menu_item_parent) {
						// Top-level menu items
						$menu_tree[$item->ID] = &$menu_map[$item->ID];
					} else {
						// Child menu items
						$menu_map[$item->menu_item_parent]['children'][] = &$menu_map[$item->ID];
					}
				}

				// Return the structured menu tree
				return array_values($menu_tree);
			} else {
				return [];
			}
		} else {
			return [];
		}
	}

	
	
}