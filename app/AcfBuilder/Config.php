<?php
namespace App\AcfBuilder;

class Config {
	public function init() {
		add_action('init', [$this, 'buildAcfBuilderFields']);
	}

	public function buildAcfBuilderFields() {
		$transientName = 'jaywing_acffields';

		// Use the cached version of the fields
		if (false === ($fields = get_transient($transientName))) {
			$fieldsCollection = collect(
				glob(get_template_directory() . '/app/AcfBuilder/Fields/*.php'),
			)
				->map(function ($field) {
					return require_once $field;
				})
				->map(function ($field) {
					return $field->build();
				})
				->filter(function ($value) {
					return is_array($value);
				});

			$fields = $fieldsCollection->all();

			// Don't save transient on local
			if ( ! (
					str_contains($_SERVER['SERVER_NAME'], '.local') ||
					str_contains($_SERVER['SERVER_NAME'], '.lndo')
				)
			) {
				set_transient($transientName, $fields, 3600);
			}
			
		}

		// dump($fields);

		if (
			is_array($fields) &&
			sizeof($fields) &&
			function_exists('acf_add_local_field_group')
		) {
			foreach ($fields as $fieldGroup) {
				acf_add_local_field_group($fieldGroup);
			}
		}
	}
}

$config = new Config();
$config->init();