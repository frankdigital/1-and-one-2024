<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_menu_item', [
	'hide_on_screen' => ['the_content'],
	'show_in_graphql' => true,
	'graphql_field_name' => 'jwMenuItemExtended',
]);

// prettier-ignore

$builder
    ->setLocation('nav_menu_item', '==', 'location/primary_navigation');
    

// prettier-ignore
$builder
    ->addField('icon', 'icon-picker', [
        'label' => 'Icon',
        'required' => false,
    ])

    ->addTrueFalse('enable_excerpt', [
        'label' => 'Enable Excerpt',
        'instructions' => 'Check this box to add a Excerpt to the menu item.',
        'ui' => 1,
    ])

    ->addTextarea('excerpt', [
        'label' => 'Excerpt',
        'instructions' => 'Enter a short description of the menu item.',
        'rows' => 2,
        'conditional_logic' => [
            [
                [
                    'field' => 'enable_excerpt',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])

    ->addTrueFalse('enable_featured', [
        'label' => 'Is Featured',
        'instructions' => 'Check this box to feature this menu item.',
        'ui' => 1,
    ])

    ->addRepeater('featured', [
        'label' => 'Featured Items',
        'instructions' => 'Add featured items to display in the menu.',
        'layout' => 'block',
        'button_label' => 'Add Item',
        'min' => 1,
        'max' => 2,
        'conditional_logic' => [
            [
                [
                    'field' => 'enable_featured',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
        ->addText('heading', [
            'required' => true,
            'instructions' => 'Enter the title of the featured item.',
            'label' => 'Heading',
        ])

        ->addTextarea('supporting_text', [
            'required' => false,
            'instructions' => 'Enter the title of the featured item.',
            'label' => 'Supporting Text',
        ])
        
        ->addLink('link', [
            'required' => true,
            'instructions' => 'Enter the link of the featured item.',
            'label' => 'Link',
        ])

        ->addImage('logo', [
            'label' => 'Logo',
            'instructions' => 'Logo is optional.'
        ])
        
        ->addImage('image', [
            'label' => 'Image',
            'instructions' => 'Images of Featured Item is not required. If no image is set it will display a fallback image as placeholder. Recommended sizes W:1104px H:1104px Format:JPEG',
            'min_width' => '552',
            'min_height' => '552',
        ])
    
    ->endRepeater();

return $builder;