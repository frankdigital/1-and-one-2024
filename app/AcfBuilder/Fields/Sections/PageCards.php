<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('page_cards', [
	'label' => 'Page Cards',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentPageCards',
    ])
        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])

        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()
            
        ->addRelationship('pages', [
            'label' => 'Pages',
            'post_type' => ['page'],
            'min' => 2,
            'layout' => 'block',
            'button_label' => 'Add Card',
            'return_format' => 'id',
            'filters' => [
                0 => 'search',
            ],
        ])
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;