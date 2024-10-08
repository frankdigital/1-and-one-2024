<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('template_custom', [
	'hide_on_screen' => ['the_content'],
	'show_in_graphql' => true,
	'graphql_field_name' => 'customTemplate',
	'map_graphql_types_from_location_rules' => 0,
	'graphql_types' => 'PageDefault',
]);

// prettier-ignore
$builder
	->setLocation('page_template', '==', 'template-custom.blade.php');

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