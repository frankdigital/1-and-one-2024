<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('options_footer', [
	'graphql_field_name' => 'optionsFooter',
]);

$builder
	->setLocation('options_page', '==', 'options-footer');


$builder
	->addGroup('options_footer', [
		'label' => ''
	])
		->addRelationship('locations', [
			'label' => 'Locations', 
			'max' => 4,
			'min' => 1,
			'post_type' => ['location']
		])

		->addRepeater('featured_links', [
			'label' => 'Featured Links',
			'min' => 1,
			'layout' => 'block'
		])
			->addLink('link', ['label' => 'Link'])
		->endRepeater()
		
		->addRepeater('links', [
			'label' => 'Links',
			'min' => 1,
			'layout' => 'block'
		])
			->addLink('link', ['label' => 'Link'])
		->endRepeater()
	->endGroup();
	

return $builder;