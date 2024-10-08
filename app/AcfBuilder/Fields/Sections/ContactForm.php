<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Traits\UseHelpers as Helpers;

$builder = new FieldsBuilder('contact_form', [
	'label' => 'Contact Form',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentContactForm',
    ])
        ->addFields(get_field_partial('Fields.Atoms.Eyebrow'))

        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))
        
        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])
        ->addSelect('form', [
            'label' => 'Select Form',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => [],
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'choices' => get_gravity_forms_options(),
            'default_value' => [],
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ])
       
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;




		