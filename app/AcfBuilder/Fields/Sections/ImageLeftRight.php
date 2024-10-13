<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('image_left_right', [
    'label' => 'Image Left Right',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentImageLeftRight',
    ])
        ->addButtonGroup('orientation', [
            'required' => true,
            'choices' => [
                'image-left' => 'Image Left',
                'image-right' => 'Image Right',
            ],
        ])

        ->addImage('image', [
            'required' => true,
            'label' => 'Image',
            'instructions' => 'Recommended sizes W:848px (1696px) H:560px (1120px) Format:JPEG/PNG/WEBP',
            'min_width' => '848',
            'min_height' => '560',
        ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.Heading'))
        
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

        ->addAccordion('settings', [
            'label' => 'Settings'
        ])
            ->addButtonGroup('bg_color', [
                'label' => 'Background Color',
                'instructions' => 'Choose the background color for the section',
                'choices' => [
                    'lighter' => 'Lighter',
                    'darker' => 'Darker',
                ],
                'default_value' => 'lighter',
            ])
        ->addAccordion('settings_end')->endpoint()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;