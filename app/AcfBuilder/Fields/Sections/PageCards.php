<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('page_cards', [
	'label' => 'Page Cards',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentPageCards',
    ])
        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])
            
        ->addRelationship('pages', [
            'label' => 'Pages',
            'post_type' => ['page'],
            'min' => 2,
            'layout' => 'block',
            'button_label' => 'Add Card',
            'return_format' => 'id',
            'filters' => [
                0 => 'search',
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
            ->addTrueFalse('toggle_pagination', [
                'label' => 'Pagination',
                'instructions' => 'Display pagination for the posts. This will only display if there are more than 12 posts.',
                'default_value' => 1,
                'ui' => 1,
            ])

            ->addButtonGroup('columns', [
                'label' => 'Columns',
                'instructions' => 'Choose the number of columns for the posts.',
                'choices' => [
                    'two_columns' => '2 Columns',
                    'three_columns' => '3 Columns',
                ],
                'default_value' => 'two_columns',
            ])
        ->addAccordion('settings_end')->endpoint()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;