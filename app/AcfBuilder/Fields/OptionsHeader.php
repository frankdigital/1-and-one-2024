<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$fields = new FieldsBuilder('options_header', [
	'graphql_field_name' => 'optionsHeader',
]);

$fields
	->setLocation('options_page', '==', 'options-header');

$fields
	->addGroup('options_header', [
		'label' => 'Header/ Navigation Options'
	])
		->addGroup('header', ['label' => 'Header'])
			->addFields(get_field_partial('Fields.Components.CtaPrimary'))
			->addFields(get_field_partial('Fields.Components.CtaSecondary'))
		->endGroup()
	->endGroup();

return $fields;