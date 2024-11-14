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

        ->addTrueFalse('enable_global_content_tiles', [
            'label' => 'Enable Global Content Tiles',
            'default_value' => 0,
            'ui' => 1,
        ])

        ->addGroup('content', [
            'label' => 'Content Tiles',
            'graphql_field_name' => 'contentContentTiles',
            'conditional_logic' => [
                [
                    [
                        'field' => 'enable_global_content_tiles',
                        'operator' => '==',
                        'value' => '1',
                    ],
                ],
            ],
        ])
            ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
            
            ->addWysiwyg('description', [
                'label' => 'Supporting Text',
                'toolbar' => 'minimal',
                'media_upload' => false,
                'delay' => 0,
            ])
    
            ->addRepeater('tiles', [
                'label' => 'Tiles',
                'layout' => 'block',
                'min' => 1,
            ])
                ->addField('icon', 'icon-picker', [
                    'label' => 'Icon',
                    'required' => true,
                ])
    
                ->addFields(get_field_partial('Fields.Atoms.Heading'))
    
                ->addTextarea('description', [
                    'label' => 'Description',
                    'maxlength' => '350',
                ])  
    
                ->addImage('image', [
                    'required' => true,
                    'label' => 'Image',
                ])
            ->endRepeater()
    
            ->addAccordion('ctas', [
                'label' => 'Call to Actions'
            ])
                ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
            ->addAccordion('ctas_end')->endpoint()
        ->endGroup()

        ->addRelationship('global_content_tiles', [
            'label' => 'Global Content Tiles',
            'instructions' => 'Select the content tiles that will be displayed on all pages.',
            'post_type' => ['page'],
            'return_format' => 'id',
            'conditional_logic' => [
                [
                    [
                        'field' => 'enable_global_content_tiles',
                        'operator' => '==',
                        'value' => '1',
                    ],
                ],
            ],
        ])
	->endGroup();

return $fields;