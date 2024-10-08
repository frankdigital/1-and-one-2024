<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_page', [
	'hide_on_screen' => ['the_content'],
    'label' => 'Page Default',
	'show_in_graphql' => true,
	'graphql_field_name' => 'pageDefault',
	'map_graphql_types_from_location_rules' => 0,
	'graphql_types' => 'pageDefault',
]);

// prettier-ignore
$builder
	->setLocation('page_template', '==', 'default');

// prettier-ignore
$builder
    ->addGroup('hero', [
        'label' => 'Hero',
        'show_in_graphql' => true
    ])
        ->addFields(get_field_partial('Fields.Heroes.StandardHero'))
    ->endGroup()

    ->addFields(get_field_partial('Fields.Partials.FlexibleSections'));

        
return $builder;