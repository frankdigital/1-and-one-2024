<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('locations_tabbed', [
	'label' => 'Locations - Tabbed',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentLocationsTabbed',
    ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))

        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])




        ->addTrueFalse('custom_locations_select', [
            'label' => 'Custom selection',
            'ui' => true,
            'ui_on_text' => 'Custom',
            'ui_off_text' => 'All',
        ])

        ->addRelationship('locations', [
			'label' => 'Locations', 
			'min' => 1,
			'post_type' => ['location'],
            'conditional_logic' => [
                [
                    [
                        'field' => 'custom_locations_select',
                        'operator' => '==',
                        'value' => '1',
                    ],
                ],
            ],
		])

        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
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