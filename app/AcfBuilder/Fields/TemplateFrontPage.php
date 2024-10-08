<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_front_page', [
	'hide_on_screen' => ['the_content'],
    'label' => 'Front Page',
	'show_in_graphql' => true,
	'graphql_field_name' => 'pageDefault',
	'map_graphql_types_from_location_rules' => 0,
	'graphql_types' => 'pageDefault',
]);

// prettier-ignore
$builder
	->setLocation('page_template', '==', 'template-front-page.blade.php');

// prettier-ignore
$builder
    ->addGroup('hero', [
        'label' => 'Hero',
        'show_in_graphql' => true
    ])
        ->addFields(get_field_partial('Fields.Heroes.PrimaryHero'))
    ->endGroup()

    ->addFields(get_field_partial('Fields.Partials.FlexibleSections'));

        
return $builder;