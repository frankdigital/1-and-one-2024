<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('blog_listing', [
	'label' => 'Blog Listing',
]);

// prettier-ignore
$builder
    ->addGroup('content', [
        'label' => '',
        'graphql_field_name' => 'contentBlogListing',
    ])
        ->addRelationship('posts', [
            'label' => 'Posts',
            'instructions' => 'Select the posts you would like to display.',
            'post_type' => ['post'],
            'min' => 3,
            'return_format' => 'object',
        ])

        ->addTrueFalse('toggle_pagination', [
            'label' => 'Pagination',
            'instructions' => 'Display pagination for the posts.',
            'default_value' => 1,
            'ui' => 1,
        ])
    ->endGroup()

    ->addFields(get_field_partial('Fields.Components.ScrollSettings'));

return $builder;