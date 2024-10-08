<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('testimonial_block');

// prettier-ignore
$builder
    ->addTextarea('testimonial', [
        'label' => 'Testimonial',
        'required' => true
    ])

    ->addText('name', [
        'label' => 'Name',
        'required' => true
    ])

    ->addText('position', [
        'label' => 'Position'
    ]);

return $builder;
