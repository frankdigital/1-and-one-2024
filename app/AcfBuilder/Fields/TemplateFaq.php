<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_faq', [
	'hide_on_screen' => ['the_content'],
	'show_in_graphql' => true,
	'graphql_field_name' => 'faqTemplate',
	'map_graphql_types_from_location_rules' => 0,
	'graphql_types' => 'PageDefault',
]);

// prettier-ignore
$builder
    ->setLocation('post_type', '==', 'faq');

// prettier-ignore
$builder

    ->addGroup('post_type_data', [
        'label' => 'Key Information',
        'show_in_graphql' => true
    ])
        ->addWysiwyg('answer', [
            'label' => 'Answer',
            'instructions' => 'Enter the answer of the FAQ.',
            'required' => true,
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 1,
        ])
    ->endGroup();

    // ->addFields(get_field_partial('Fields.Partials.FlexibleSections'));

return $builder;