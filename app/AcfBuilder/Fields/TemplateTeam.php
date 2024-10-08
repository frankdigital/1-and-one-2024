<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_team', [
	'hide_on_screen' => ['the_content'],
	'show_in_graphql' => true,
	'graphql_field_name' => 'teamTemplate',
	'map_graphql_types_from_location_rules' => 0,
	'graphql_types' => 'PageDefault',
]);

// prettier-ignore
$builder
    ->setLocation('post_type', '==', 'team');

// prettier-ignore
$builder

    ->addGroup('post_type_data', [
        'label' => 'Key Information',
        'show_in_graphql' => true
    ])
        ->addText('name', [
            'label' => 'Name',
            'instructions' => 'Enter the name of the team member.',
            'required' => true,
            'placeholder' => 'e.g. John Doe',
        ])

        ->addText('position', [
            'label' => 'Position',
            'instructions' => 'Enter the position of the team member.',
            'required' => true,
            'placeholder' => 'e.g. CEO, Manager, Developer',
        ])
    
        ->addGroup('contact', [
            'label' => 'Contact Information',
            'show_in_graphql' => true
        ])
            ->addGroup('phone')
                ->addText('formatted_number', [
                    'label' => 'Formatted Number',
                    'instructions' => 'Add the formatted telephone number, with spaces, dashes and brackets.',
                    'required' => true,
                    'placeholder' => 'e.g. (02) 234 567 890',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ])
            
                ->addText('number', [
                    'label' => 'Unformatted Number',
                    'instructions' => 'Add the formatted telephone number, <b>without</b> spaces, dashes and brackets.',
                    'required' => true,
                    'placeholder' => 'e.g. 02234567890',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ])
            ->endGroup()

            ->addEmail('email', [
                'label' => 'Email',
                'instructions' => 'Enter the email address of the location.',
                'required' => false,
                'placeholder' => 'location@name.com.au',
            ])

            ->addUrl('linkedin', [
                'label' => 'LinkedIn',
                'instructions' => 'Enter the LinkedIn URL of the team member.',
                'required' => false,
                'placeholder' => 'https://www.linkedin.com/in/johndoe',
            ])
        ->endGroup()

        ->addWysiwyg('description', [
            'label' => 'Description',
            'instructions' => 'Enter the description of the team member.',
            'required' => true,
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 1,
        ])
    ->endGroup();

    // ->addFields(get_field_partial('Fields.Partials.FlexibleSections'));

return $builder;