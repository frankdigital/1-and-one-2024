<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('image_block');

// prettier-ignore
$builder
    ->addImage('image', [
        'label' => 'Image',
        'required' => true,
        'instructions' => 'Image will be display at the natural image ratio',
    ])

    ->addButtonGroup('width', [
        'label' => 'Width',
        'instructions' => 'Choose the width of the image block',
        'choices' => [
            'wide' => 'Wide',
            'narrow' => 'Narrow',
        ],
        'default_value' => 'wide',
    ])

    ->addText('credit', [
        'label' => 'Credit',
        'required' => false
    ]);

return $builder;