<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta_primary', [
	'label' => 'CTA Primary',
]);

// prettier-ignore
$builder
    ->addGroup('primary_cta', [
        'label' => 'Primary CTA',
        'wrapper' => [
            'width' => 50
        ]
    ])
        ->addFields(get_field_partial('Fields.Components.CtaEnabled'))
    ->endGroup();

return $builder;