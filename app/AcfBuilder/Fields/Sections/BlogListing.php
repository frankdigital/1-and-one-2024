<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('blog_listing', [
	'label' => 'Blog Listing',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentBlogListing',
    ])
        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.Heading'))

        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])

        ->addSelect('content_type', [
            'label' => 'Content Type',
            'instructions' => 'Select the type of content you would like to display.',
            'choices' => [
                'automatic' => 'Automatic Posts',
                'curated' => 'Curated Posts',
            ],
            'default_value' => 'automatic',
            'ui' => 1,
        ])

        ->addRelationship('posts', [
            'label' => 'Posts',
            'instructions' => 'Select the posts you would like to display.',
            'post_type' => ['post'],
            'min' => 3,
            'return_format' => 'object',
            'conditional_logic' => [
                [
                    [
                        'field' => 'content_type',
                        'operator' => '==',
                        'value' => 'curated',
                    ],
                ],
            ],
        ])

        ->addMessage('Automatic Posts', 'Published post will automatically be displayed in date DESC order.', [
            'conditional_logic' => [
                [
                    [
                        'field' => 'content_type',
                        'operator' => '==',
                        'value' => '0',
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
            ->addTrueFalse('toggle_pagination', [
                'label' => 'Pagination',
                'instructions' => 'Display pagination for the posts. This will only display if there are more than 12 posts.',
                'default_value' => 1,
                'ui' => 1,
            ])

            ->addTrueFalse('hide_date', [
                'label' => 'Hide Date',
                'instructions' => 'Hide the date for the posts.',
                'default_value' => 0,
                'ui' => 1,
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

            ->addButtonGroup('columns', [
                'label' => 'Columns',
                'instructions' => 'Choose the number of columns for the posts.',
                'choices' => [
                    'two_columns' => '2 Columns',
                    'three_columns' => '3 Columns',
                ],
                'default_value' => 'three_columns',
            ])
        ->addAccordion('settings_end')->endpoint()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;