<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('usp_vertical', [
	'label' => 'USP Vertical',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentUspVertical',
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

        ->addRepeater('usps', [
            'label' => 'USPs',
            'min' => 3,
            'layout' => 'block',
            'button_label' => 'Add USP',
        ])
            ->addField('icon', 'icon-picker', [
                'label' => 'Icon',
                'required' => false,
            ])

            ->addFields(get_field_partial('Fields.Atoms.Heading'))

            ->addWysiwyg('description', [
                'label' => 'Description',
                'toolbar' => 'minimal',
                'media_upload' => false,
                'delay' => 0,
            ])  

            ->addFields(get_field_partial('Fields.Components.CtaTextLink'))
        ->endRepeater()
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;