<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('cta_block');

// prettier-ignore
$builder

    ->addFields(get_field_partial('Fields.Atoms.Heading'))

    ->addWysiwyg('description', [
        'label' => 'Supporting Text',
        'toolbar' => 'minimal',
        'media_upload' => false,
        'delay' => 0,
    ])
    ->addFields(get_field_partial('Fields.Components.CtaPrimary'));

return $builder;
