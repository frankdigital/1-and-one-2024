<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('content_tiles', [
	'label' => 'Content Tiles',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentContentTiles',
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

        ->addRepeater('tiles', [
            'label' => 'Tiles',
            'layout' => 'block',
            'min' => 1,
        ])
            ->addField('icon', 'icon-picker', [
                'label' => 'Icon',
                'required' => true,
            ])

            ->addFields(get_field_partial('Fields.Atoms.Heading'))

            ->addTextarea('description', [
                'label' => 'Description',
                'maxlength' => '350',
            ])  

            ->addImage('image', [
                'required' => true,
                'label' => 'Image',
            ])
        ->endRepeater()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;