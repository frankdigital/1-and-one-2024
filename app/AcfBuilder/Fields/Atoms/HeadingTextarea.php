<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('heading', [
	'label' => 'Heading',
]);

// prettier-ignore
$builder
    ->addTextarea('heading', [
        'required' => true,
        'label' => 'Heading',
        'rows' => 2,
        'new_lines' => 'br', // Possible values are 'wpautop', 'br', or ''.
    ]);

return $builder;