<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta', [
	'label' => 'CTA',
]);

// prettier-ignore
$builder
    ->addButtonGroup('type', [
        'label' => 'Function',
        'required' => true,
        'choices' => [
            'link' => 'Link',
            'button' => 'Button',
        ],
        'layout' => 'horizontal',
        'wrapper' => [
            'width' => '50'
        ]
    ])

    ->addRadio('button_type', [
        'label' => 'Button Type',
        'required' => true,
        'choices' => [
            'video' => 'Video Modal',
            'team' => 'Team Modal',
        ],
        'layout' => 'horizontal',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'button',
                ],
            ],
        ],
    ])

    ->addLink('url', [
        'required' => true,
        'label' => 'URL',
        'instructions' => 'Set the link URL and label',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'link',
                ],
            ],
        ],
    ])

    ->addText('label', [
        'instructions' => 'Add a label for the button',
        'required' => true,
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'button',
                ],
            ]
        ],
    ])

    ->addGroup('team_modal', [
        'label' => 'Modal Data',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'button',
                ],
                [
                    'field' => 'button_type',
                    'operator' => '==',
                    'value' => 'team',
                ],
            ],
        ],
    ])
        ->addPostObject('team', [
            'label' => 'Select Team Member',
            'post_type' => ['team'],
            'required' => true,
        ])
    ->endGroup()

    ->addGroup('video_modal', [
        'label' => 'Modal Data',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'button',
                ],
                [
                    'field' => 'button_type',
                    'operator' => '==',
                    'value' => 'video',
                ],
            ],
        ],
    ])
        ->addSelect('video_type', [
            'ui' => 1,
            'choices' => [
                'upload' => 'Upload',
                'embed' => 'Embed',
            ],
        ])

        ->addFile('video', [
            'required' => true,
            'mime_types' => '.mp4',
            'conditional_logic' => [
                [
                    [
                        'field' => 'video_type',
                        'operator' => '==',
                        'value' => 'upload',
                    ],
                ],
            ],
        ])

        ->addOembed('embed', [
            'label' => 'Embed URL',
            'required' => true,
            'conditional_logic' => [
                [
                    [
                        'field' => 'video_type',
                        'operator' => '==',
                        'value' => 'embed',
                    ],
                ],
            ],
        ])
    ->endGroup();

return $builder;