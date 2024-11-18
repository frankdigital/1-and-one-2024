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

        ->addRadio('content_type', [
            'label' => 'Content Type',
            'choices' => [
                'manual' => 'Manual',
                'pages' => 'Pages',
            ],
            'default_value' => 'manual',
            'layout' => 'horizontal',
        ])

        ->addRelationship('pages_automatic', [
            'label' => 'Pages',
            'post_type' => ['page'],
            'max' => 12,
            'instructions' => 'Select the pages you would like to display. This will automtaically pull the content from the selected pages.',
            'conditional_logic' => [
                [
                    [
                        'field' => 'content_type',
                        'operator' => '==',
                        'value' => 'pages',
                    ],
                ],
            ],
        ])

        ->addRepeater('pages', [
            'label' => 'Pages',
            'layout' => 'block',
            'min' => 2,
            'conditional_logic' => [
                [
                    [
                        'field' => 'content_type',
                        'operator' => '==',
                        'value' => 'manual',
                    ],
                ],
            ],
        ])
           ->addImage('image', [
                'label' => 'Image',
                'required' => true,
            ])
            ->addFields(get_field_partial('Fields.Atoms.Heading'))

            ->addTextarea('description', [
                'label' => 'Description',
                'maxlength' => '350',
            ])
        ->endRepeater()

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