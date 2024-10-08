<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta_primary', [
	'label' => 'CTA Primary',
]);

// prettier-ignore
$builder
    ->addGroup('text_link_cta', [
        'label' => 'Text Link CTA',
    ])
        ->addFields(get_field_partial('Fields.Components.CtaEnabled'))
    ->endGroup();

return $builder;