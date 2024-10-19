<?php

use App\Fields\Components\Wysiwyg\ImageBlock;
use App\Fields\Components\Wysiwyg\TestimonialBlock;
use App\Fields\Components\Wysiwyg\TextBlock;
use App\Fields\Components\Wysiwyg\VideoBlock;
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('wysiwyg_builder', [
    'label' => 'WYSIWYG Builder',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentWysiwygBuilder',
    ])

        ->addFlexibleContent('wysiwyg_builder', [
            'instructions' => '',
            'required' => 0,
            'button_label' => 'Add WYSIWYG Block',
        ])
            ->addLayout(get_field_partial('Fields.Components.Wysiwyg.CtaBlock'))
            ->addLayout(get_field_partial('Fields.Components.Wysiwyg.ImageBlock'))
            ->addLayout(get_field_partial('Fields.Components.Wysiwyg.TestimonialBlock'))
            ->addLayout(get_field_partial('Fields.Components.Wysiwyg.TextBlock'))
            // ->addLayout(get_field_partial('Fields.Components.Wysiwyg.VideoBlock'))
        ->endFlexibleContent()

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