<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('options_search_modal', [
	'graphql_field_name' => 'optionsSearchModal',
]);

$builder
    ->setLocation('options_page', '==', 'theme-search-modal-settings');

$builder
	->addGroup('search_modal', ['label' => 'Search Modal'])
		
	->endGroup();


return $builder;