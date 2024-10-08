<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('primary_hero', [
	'label' => 'Hero',
]);

// prettier-ignore
$builder
	->addMessage('Breadcrumbs', 'Breadcrumbs are built automatically based on the page hierarchy.')

	->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

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
		'instructions' => 'Recommended Sizes W:1440px(2880px) H:884px(1768px) format:PNG/JPEG.',
		'required' => false,
		'min_width' => '1440',
		'min_height' => '884',
	])
	
	->addAccordion('ctas', [
		'label' => 'Call to Actions'
	])
		->addFields(get_field_partial('Fields.Components.CtaPrimary'))
		->addFields(get_field_partial('Fields.Components.CtaSecondary'))
	->addAccordion('ctas_end')->endpoint();

return $builder;