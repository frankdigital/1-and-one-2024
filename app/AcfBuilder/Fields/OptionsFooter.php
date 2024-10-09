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
		->addGroup('content', [
			'label' => 'Call to Action'
		])
			->addText('heading', ['label' => 'Heading'])
			->addTextarea('content', ['label' => 'Content'])
			
			->addAccordion('ctas', [
				'label' => 'Call to Actions'
			])
				->addFields(get_field_partial('Fields.Components.CtaPrimary'))
				->addFields(get_field_partial('Fields.Components.CtaSecondary'))
			->addAccordion('ctas_end')->endpoint()
		->endGroup()

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