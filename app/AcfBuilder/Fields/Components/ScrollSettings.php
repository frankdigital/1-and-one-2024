<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('scroll_settings', [
	'label' => 'Scroll Settings',
]);

// prettier-ignore
$builder
    ->addAccordion('scroll_settings', [
        'label' => 'Scroll Settings'
    ])
        ->addTrueFalse('enable_scroll_id', [
            'label' => 'Enable Scroll',
            'instructions' => 'Enabling this will add the Flexible Section to the contextual nav and allow this component to be scrolled to via an Anchor Tag',
            'ui' => true,
        ])

        ->addText('scroll_id', [
            'label' => 'Scroll ID',
            'instructions' => 'Define a Scroll ID that will be used to anchor internal links. Please don not use the same ID more than once on a page. This will not be visible on the UI',
            'conditional_logic' => [
                [
                    [
                        'field' => 'enable_scroll_id',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ])
    ->addAccordion('scroll_settings_end')->endpoint();

return $builder;