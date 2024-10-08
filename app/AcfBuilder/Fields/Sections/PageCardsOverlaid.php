<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('page_cards_overlaid', [
	'label' => 'Page Cards - Overlaid',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentPageCardsOverlaid',
    ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))

        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])

        ->addRelationship('pages', [
            'label' => 'Pages',
            'post_type' => ['page'],
            'min' => 3,
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
