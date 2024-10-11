<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('flexible-sections');

// prettier-ignore
$builder
	->addFlexibleContent('flexible_sections', [
		'button_label' => 'Add Section',
		'label' => 'Page Builder',
	])
		->addLayout(get_field_partial('Fields.Sections.BlogListing'))
		->addLayout(get_field_partial('Fields.Sections.ContactForm'))
		->addLayout(get_field_partial('Fields.Sections.ContentTiles'))
		->addLayout(get_field_partial('Fields.Sections.CtaBlock'))
		->addLayout(get_field_partial('Fields.Sections.ImageLeftRight'))
		->addLayout(get_field_partial('Fields.Sections.FullWidthImage'))
		->addLayout(get_field_partial('Fields.Sections.PageCards'))
		->addLayout(get_field_partial('Fields.Sections.LocationsTabbed'))
		->addLayout(get_field_partial('Fields.Sections.LogosStandard'))
		->addLayout(get_field_partial('Fields.Sections.ServiceTiles'))
		->addLayout(get_field_partial('Fields.Sections.Team'))
		->addLayout(get_field_partial('Fields.Sections.UspVertical'))
		->addLayout(get_field_partial('Fields.Sections.WysiwygBuilder'))
	->endFlexibleContent();

return $builder;