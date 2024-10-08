<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('logos_carousel', [
	'label' => 'Logos - Carousel',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentLogosCarousel',
    ])

        ->addFields(get_field_partial('Fields.Atoms.HeadingTextarea'))

        ->addWysiwyg('description', [
            'label' => 'Supporting Text',
            'toolbar' => 'minimal',
            'media_upload' => false,
            'delay' => 0,
        ])

        ->addGallery('images', [
            'label' => 'Logos',
            'instructions' => 'Recommended sizes W:182px (364px) H:140px (280px) Format:JPEG/PNG/WEBP',
            'min' => 1,
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'mime_types' => 'jpg,jpeg,png,webp',
        ])

    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;
