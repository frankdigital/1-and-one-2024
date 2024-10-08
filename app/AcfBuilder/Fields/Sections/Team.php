<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('team', [
	'label' => 'Team',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentTeam',
    ])

        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))
        
        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
        ->addAccordion('ctas', [
            'label' => 'Call to Actions'
        ])
            ->addFields(get_field_partial('Fields.Components.CtaPrimary'))
        ->addAccordion('ctas_end')->endpoint()
            
        ->addRelationship('team', [
            'label' => 'Team Members',
            'post_type' => ['team'],
            'min' => 1,
        ])
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;