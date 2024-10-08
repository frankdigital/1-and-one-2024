<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('strapline', [
	'label' => 'Strapline',
]);

// prettier-ignore
$builder
    ->addText('strapline', [
        'required' => true,
        'instructions' => 'Add a strapline to the component',
    ]);

return $builder;
