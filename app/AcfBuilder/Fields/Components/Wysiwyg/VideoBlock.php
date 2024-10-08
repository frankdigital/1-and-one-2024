<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('video_block');

// prettier-ignore
$builder
    ->addImage('poster_image', [
        'label' => 'Poster Image',
        'required' => true,
        'instructions' => 'This will be displayed before the modal is shown',
    ])

    ->addText('credit', [
        'label' => 'Credit',
        'required' => false
    ])

    ->addGroup('video_modal', [
        'label' => 'Modal Data',
    ])
        ->addSelect('video_type', [
            'ui' => 1,
            'choices' => [
                'upload' => 'Upload',
                'embed' => 'Embed'
            ]
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
