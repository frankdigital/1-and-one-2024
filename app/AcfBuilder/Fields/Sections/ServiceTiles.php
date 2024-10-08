<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('service_tiles', [
	'label' => 'Service Tiles',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentServiceTiles',
    ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))
        
        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()
            
        ->addRelationship('pages', [
            'label' => 'Pages',
            'post_type' => ['page'],
            'min' => 1,
            'layout' => 'block',
            'button_label' => 'Add Tile',
            'return_format' => 'id',
            'filters' => [
                0 => 'search',
            ],
        ])
        
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;