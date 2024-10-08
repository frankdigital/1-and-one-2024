<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('intro', [
	'label' => 'Intro',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentIntro',
    ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))

        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])

        ->addImage('image', [
            'required' => true,
            'label' => 'Image',
            'instructions' => 'Recommended sizes W:1200px (1400x) H:560px (1120px) Format:JPEG/PNG/WEBP',
        ])

        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()

    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;
