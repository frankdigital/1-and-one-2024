<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta_secondary', [
	'label' => 'CTA Secondary',
]);

// prettier-ignore
$builder
    ->addGroup('secondary_cta', [
        'label' => 'Secondary CTA',
        'wrapper' => [
            'width' => 50
        ]
    ])
        ->addFields(get_field_partial('Fields.Components.CtaEnabled'))
    ->endGroup();

return $builder;