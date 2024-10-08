<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_post', [
	'hide_on_screen' => ['the_content'],
    'label' => 'Post Default',
	'show_in_graphql' => true,
	'map_graphql_types_from_location_rules' => 0,
]);

// prettier-ignore
$builder
    ->setLocation('post_type', '==', 'post');

// prettier-ignore
$builder
    ->addGroup('hero', [
        'label' => 'Hero',
        'show_in_graphql' => true
    ])
        ->addFields(get_field_partial('Fields.Heroes.BlogHero'))
    ->endGroup()

    ->addGroup('post_type_data', [
        'label' => 'Key Information',
        'show_in_graphql' => true
    ])
        ->addText('read_time', [
            'label' => 'Read Time',
            'instructions' => 'The estimated read time of the post.',
            'required' => false,
            'append' => 'minutes',
        ])

        ->addTextarea('excerpt', [
            'label' => 'Excerpt',
            'instructions' => 'A short description of the post. This will be used in the meta description and in the post preview.',
            'rows' => 2,
            'new_lines' => 'br',
        ])
    ->endGroup()

    ->addFields(get_field_partial('Fields.Partials.FlexibleSections'));

        
return $builder;