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

	->addTextarea('supporting_text', [
		'label' => 'Supporting Text',
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
	
	->addAccordion('ctas', [
		'label' => 'Call to Actions'
	])
		->addFields(get_field_partial('Fields.Components.CtaPrimary'))
		->addFields(get_field_partial('Fields.Components.CtaSecondary'))
	->addAccordion('ctas_end')->endpoint();

return $builder;