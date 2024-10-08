<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('eyebrow', [
	'label' => 'Eyebrow',
]);

// prettier-ignore
$builder
    ->addText('eyebrow', [
        'required' => false,
        'label' => 'Eyebrow',
        // 'instructions' => 'Add a eyebrow to the component',
    ]);

return $builder;