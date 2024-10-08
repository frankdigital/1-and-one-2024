<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('full_width_image', [
	'label' => 'Full Width Image',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentFullWidthImage',
    ])
        ->addButtonGroup('orientation', [
            'required' => true,
            'choices' => [
                'content-left' => 'Content Left',
                'content-right' => 'Content Right'
            ],
        ])

        ->addImage('image', [
            'required' => true,
            'label' => 'Image',
            'instructions' => 'Recommended sizes W:1440px (2880x) H:696px (1392px) Format:JPEG/PNG/WEBP',
        ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])

        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;