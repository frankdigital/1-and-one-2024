<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta_enabled', [
	'label' => 'Enable CTA',
]);

// prettier-ignore
$builder
    ->addTrueFalse('enable_cta', [
        'label' => 'Enable CTA',
        'ui' => true,
    ])

    ->addGroup('cta', [
        'label' => 'CTA',
        'conditional_logic' => [
            [
                [
                    'field' => 'enable_cta',
                    'operator' => '==',
                    'value' => 1,
                ],
            ],
        ],
    ])
        ->addFields(get_field_partial('Fields.Components.Cta'))
    ->endGroup();

return $builder;