<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$fields = new FieldsBuilder('options_general', [
	'graphql_field_name' => 'optionsGeneral',
]);

$fields
	->setLocation('options_page', '==', 'options');

$fields
	->addGroup('options_general', [
		'label' => ''
	])
		->addGroup('socials', ['label' => 'Socials'])
			->addUrl('facebook', ['label' => 'Facebook'])
			->addUrl('instagram', ['label' => 'Instagram'])
			->addUrl('linkedin', ['label' => 'LinkedIn'])
		->endGroup()
		->addGroup('contact', ['label' => 'Contact'])
            ->addGroup('location', [
                'label' => '',
                'show_in_graphql' => true
            ])

                ->addText('name', [
                    'label' => 'Location Name',
                    'instructions' => 'Enter the name of the location.',
                    'required' => true,
                    'placeholder' => 'e.g. Sydney CBD',
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
                'placeholder' => 'email@name.com.au',
            ])
		->endGroup()

        ->addGroup('page_parent', ['label' => 'Page Parents'])
            ->addPostObject('post_page_parent', [
                'label' => 'Post Page Parent',
                'instructions' => 'Select the page that will be used as the parent for all posts.',
                'required' => true,
                'post_type' => ['page'],
            ])
        ->endGroup()
	->endGroup();

return $fields;