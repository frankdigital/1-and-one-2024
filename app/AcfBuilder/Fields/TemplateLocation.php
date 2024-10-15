<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_location', [
	'hide_on_screen' => ['the_content'],
	'show_in_graphql' => true,
	'graphql_field_name' => 'locationTemplate',
	'map_graphql_types_from_location_rules' => 0,
	'graphql_types' => 'PageDefault',
]);

// prettier-ignore
$builder
    ->setLocation('post_type', '==', 'location');

// prettier-ignore
$builder
    ->addGroup('hero', [
        'label' => 'Hero',
        'show_in_graphql' => true
    ])
        ->addFields(get_field_partial('Fields.Heroes.StandardHero'))
    ->endGroup()

    ->addGroup('post_type_data', [
        'label' => 'Key Information',
        'show_in_graphql' => true
    ])
        ->addGroup('location', [
            'label' => '',
            'show_in_graphql' => true
        ])
            ->addTextarea('override_google_address', [
                'label' => 'Address',
                'instructions' => 'Enter the address of the location. This will be used to display the address on the front end instead of the addrees produced by Google Maps.',
                'rows' => 2,
                'new_lines' => 'br',
            ])  
        ->endGroup()

        ->addTrueFalse('enable_head_office', [
            'label' => 'Enable Head Office',
            'instructions' => 'Check this box if this location is a head office.',
            'default_value' => 0,
            'ui' => 1
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
        ->endGroup()
    ->endGroup();

return $builder;