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
            ->addGoogleMap('google_map_data', [
                'label' => 'Google Map',
                'instructions' => '',
                'required' => 0,	
                'center_lat' => '',
                'center_lng' => '',
                'zoom' => '',
                'height' => '',
            ])

            ->addAccordion('address', [
                'label' => 'Location Address',
                
                'show_in_graphql' => true
            ])
                ->addTrueFalse('toggle_override_google_address', [
                    'label' => 'Override Google Address',
                    'instructions' => 'Sometimes the address that Google Maps provides is not the correct address. If this is the case, you can override the address here.',
                    'default_value' => 0,
                    'ui' => 1,
                ])

                ->addTextarea('override_google_address', [
                    'label' => 'Address',
                    'instructions' => 'Enter the address of the location. This will be used to display the address on the front end instead of the addrees produced by Google Maps.',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'toggle_override_google_address',
                                'operator' => '==',
                                'value' => '1',
                            ],
                        ],
                    ],
                ])
            ->addAccordion('address_end')->endpoint()
        ->endGroup()

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

            ->addTextarea('opening_hours', [
                'label' => 'Opening Hours',
                'instructions' => 'Enter the opening hours of the location.',
                'rows' => 2,
                'new_lines' => 'br',
            ])

        ->endGroup()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Partials.FlexibleSections'));

return $builder;