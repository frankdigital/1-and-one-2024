<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('testimonials_single', [
	'label' => 'Testimonials Single',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentTestimonialSingle',
    ])
		->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

		->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
		
		->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()

		->addRepeater('testimonials', [
			'min' => 1,
			'layout' => 'block'
		])
			->addImage('logo', [
				'label' => 'Company Logo',
				'required' => true,
				'label' => 'Logo',
				'instructions' => 'Recommended sizes W:140px (280px) H:48px (96px) Format:JPEG/PNG/WEBP/SVG',
			])

			->addFields(get_field_partial('Fields.Atoms.Heading'))
			
			->addWysiwyg('description', [
				'label' => 'Supporting Text',
				'toolbar' => 'minimal',
				'media_upload' => false,
				'delay' => 0,
			])

			->addPostObject('author', [
				'label' => 'Author',
				'required' => true,
				'post_type' => ['team'],
			])
		->endRepeater()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;