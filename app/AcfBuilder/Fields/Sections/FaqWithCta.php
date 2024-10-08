<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('faq_with_cta', [
	'label' => 'FAQ /w CTA',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'faqWithCta',
    ])
        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
		->addTextarea('description', [
			'required' => false,
			'label' => 'Description',
			'rows' => 4,
			'new_lines' => 'br', 
		])

        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()

		->addRelationship('faqs', [
			'label' => 'FAQs',
			'instructions' => 'Please select at least one FAQ to enable this container.',
			'min' => 1,
			'post_type' => ['faq'],
		])
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;