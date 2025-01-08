<?php

namespace App\Wordpress;

class PostTypes {
	protected $defaultArguments = [
		'hierarchical' => false,
		'show_in_menu' => true,
		'can_export' => true,
		'show_ui' => true,
		'supports' => ['title', 'revisions'],
		'show_in_rest' => false,
		'has_archive' => false,
		'show_in_nav_menus' => false,
		'publicly_queryable' => true, //Must be true to query from GraphQL
		'rewrite' => [
			'with_front' => false,
		],
	];

	public function init() {
		add_action('init', [$this, 'createCustomPostTypes'], 10, 2);
		add_action('admin_menu', [$this, 'change_post_menu_label'], 10, 2);
	}

	function change_post_menu_label() {
		global $menu;
		global $submenu;
	
		// Change menu label
		$menu[5][0] = 'Case Studies';
	
		// Change submenu label
		$submenu['edit.php'][5][0] = 'Case Studies';
		$submenu['edit.php'][10][0] = 'Add Case Study';
	
		// Optional: Change post object labels as well
		add_action('init', function() {
			global $wp_post_types;
			if (isset($wp_post_types['post'])) {
				$labels = &$wp_post_types['post']->labels;
				$labels->name = 'Case Studies';
				$labels->singular_name = 'Case Study';
				$labels->add_new = 'Add Case Study';
				$labels->add_new_item = 'Add New Case Study';
				$labels->edit_item = 'Edit Case Study';
				$labels->new_item = 'Case Study';
				$labels->view_item = 'View Case Study';
				$labels->search_items = 'Search Case Studies';
				$labels->not_found = 'No Case Studies found';
				$labels->not_found_in_trash = 'No Case Studies found in Trash';
				$labels->all_items = 'All Case Studies';
				$labels->menu_name = 'Case Studies';
				$labels->name_admin_bar = 'Case Study';
			}
		});
	}

	public function createCustomPostTypes() {
		$this->createTeam();
		$this->createLocation();
		$this->createFaq();
	}

	public function createTeam() {
		register_post_type(
			'team',
			array_merge($this->defaultArguments, [
				'label' => 'Team',
				'labels' => [
					'name' => 'Team Members',
					'singular_name' => 'Team Member',
				],
				'supports' => ['title', 'revisions', 'thumbnail'],
				'menu_icon' => 'dashicons-networking',
				'public' => false,
				'enter_title_here' => 'Enter team member name',
				'show_in_graphql' => true,
				'graphql_single_name' => 'jwTeamMember',
				'graphql_plural_name' => 'jwTeamMembers',
			]),
		);
	}

	public function createLocation() {
		register_post_type(
			'location',
			array_merge($this->defaultArguments, [
				'label' => 'Location',
				'labels' => [
					'name' => 'Locations',
					'singular_name' => 'Location',
				],
				'supports' => ['title', 'revisions', 'post-attributes'],
				'hierarchical' => true,
				'menu_icon' => 'dashicons-location-alt',
				'public' => false,
				'enter_title_here' => 'Enter Location name',
				'show_in_graphql' => true,
				'show_in_nav_menus' => true,
				'graphql_single_name' => 'jwLocation',
				'graphql_plural_name' => 'jwLocations',
			]),
		);
	}

	public function createFaq() {
		$labels = [
			'name'                  => 'FAQ',
			'singular_name'         => 'FAQ',
			'menu_name'             => 'FAQs',
			'name_admin_bar'        => 'FAQ',
			'add_new'               => 'Add New',
			'add_new_item'          => 'Add New FAQ',
			'new_item'              => 'New FAQ',
			'edit_item'             => 'Edit FAQ',
			'view_item'             => 'View FAQ',
			'all_items'             => 'All FAQs',
			'search_items'          => 'Search FAQs',
			'parent_item_colon'     => 'Parent FAQs:',
			'not_found'             => 'No FAQ found.',
			'not_found_in_trash'    => 'No FAQs found in Trash.',
			'insert_into_item'      => 'Insert into FAQ',
			'uploaded_to_this_item' => 'Uploaded to this FAQ',
			'filter_items_list'     => 'Filter FAQs list',
			'items_list_navigation' => 'FAQs list navigation',
			'items_list'            => 'FAQs list',
		];

		register_post_type(
			'faq',
			array_merge($this->defaultArguments, [
				'labels' => $labels,
				'menu_icon' => 'dashicons-editor-help',
				'public' => false,
				'show_in_graphql' => true,
				'graphql_single_name' => 'jwFaq',
				'graphql_plural_name' => 'jwFaqs',
			]),
		);
	}
}

$postTypes = new PostTypes();
$postTypes->init();