<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('standard_hero', [
	'label' => 'Standard Hero',
]);

// prettier-ignore
$builder
	->addMessage('Breadcrumbs', 'Breadcrumbs are built automatically based on the page hierarchy.')

	->addTextarea('heading', [
		'instructions' =>
			'If no value is used then the Page Title will be used instead.',
		'rows' => 2,
		'new_lines' => 'br',
	])


	->addImage('image', [
		'label' => 'Image',
		'instructions' => 'Recommended Sizes W:1360px(2720px) H:520px(1040px) format:PNG/JPEG.',
		'required' => false,
		'min_width' => '1360',
		'min_height' => '520',
	])

	->addGroup('hero_config', [
		'label' => '',
	])
		->addTrueFalse('toggle_category', [
			'label' => 'Display Category',
			'instructions' => 'Display the category of the post.',
			'default_value' => 1,
			'ui' => 1,
			'wrapper' => [
				'width' => '33',
			],
		])

		->addTrueFalse('toggle_date', [
			'label' => 'Display Date',
			'instructions' => 'Display the date of the post.',
			'default_value' => 1,
			'ui' => 1,
			'wrapper' => [
				'width' => '33',
			],
		])

		->addTrueFalse('toggle_read_time', [
			'label' => 'Display Read Time',
			'instructions' => 'Display the estimated read time of the post.',
			'default_value' => 1,
			'ui' => 1,
			'wrapper' => [
				'width' => '33',
			],
		])
	->endGroup();;

return $builder;