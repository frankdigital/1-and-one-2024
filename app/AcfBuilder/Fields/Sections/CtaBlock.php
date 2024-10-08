<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta_block', [
	'label' => 'CTA Block',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentCtaBlock',
    ])
        ->addImage('image', [
            'required' => true,
            'label' => 'Image',
            'instructions' => 'Recommended sizes W:848px (1696px) H:560px (1120px) Format:JPEG/PNG/WEBP',
            'min_width' => '848',
            'min_height' => '560',
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
            ->addFields(get_field_partial('Fields.Components.CtaSecondary'))
        ->addAccordion('ctas_end')->endpoint()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;