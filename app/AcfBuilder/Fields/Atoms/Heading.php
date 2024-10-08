<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('heading', [
	'label' => 'Heading',
]);

// prettier-ignore
$builder
    ->addText('heading', [
        'required' => true,
        'label' => 'Heading',
        // 'instructions' => 'Add a heading to the component',
    ]);

return $builder;