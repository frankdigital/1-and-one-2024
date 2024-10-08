@php
	$componentMap = [
	    'blog_listing' => 'blog-listing.blog-listing-standard',
	    'contact_form' => 'contact-form.contact-form-default',
	    'image_left_right' => 'image-left-right.image-left-right-default',
	    'intro' => 'intro.intro',
	    'faq_standard' => 'faq.faq-standard',
	    'faq_with_cta' => 'faq.faq-with-cta',
	    'cta_block' => 'cta-block.cta-block-standard',
	    'usp_vertical' => 'usp.usp-vertical',
	    'usp_horizontal' => 'usp.usp-horizontal',
	    'locations_tabbed' => 'locations.locations-tabbed',
	    'logos_standard' => 'logos.logos-standard',
	    'logos_carousel' => 'logos.logos-carousel',
	    'page_cards' => 'page-cards.page-cards',
	    'page_cards_overlaid' => 'page-cards.page-cards-overlaid',
	    'service_tiles' => 'service-tiles.service-tiles',
	    'service_tiles_overlaid' => 'service-tiles.service-tiles-overlaid',
	    'team' => 'team.team-default',
	    'testimonials_single' => 'testimonials.testimonials-single',
	    'testimonials_dual' => 'testimonials.testimonials-dual',
	    'full_width_image' => 'full-width-image.full-width-image',
	    'wysiwyg_builder' => 'wysiwyg-builder.wysiwyg-builder',
	];
@endphp

@if ($sections && is_array($sections) && sizeof($sections))
	@foreach ($sections as $item)
		@includeIf("flexible-sections.{$componentMap[$item['acf_fc_layout']]}", [
			'section' => $item,
		])
	@endforeach
@endif
