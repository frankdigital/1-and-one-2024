<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('text_block');

// prettier-ignore
$builder
    ->addWysiwyg('wysiwyg', [
        'label' => 'Text editor',
        'required' => true
    ]);

return $builder;
