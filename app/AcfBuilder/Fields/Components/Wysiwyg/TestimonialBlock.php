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
        'required' => false
    ])

    ->addText('position', [
        'label' => 'Position',
        'required' => false,
    ]);

return $builder;