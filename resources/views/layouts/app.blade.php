<!doctype html>
<html @php(language_attributes())>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@php(do_action('get_header'))
		@php(wp_head())
	</head>

	<body @php(body_class())>
		<?php if (function_exists('gtm4wp_the_gtm_tag')) {
		    gtm4wp_the_gtm_tag();
		} ?>

		@if (is_front_page())
			<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "LocalBusiness",
					"address": "Level 1/18 National Circuit, Barton ACT 2600",
					"name": "1 and One Consulting",
					"image": "https://www.1andone.com.au/wp-content/uploads/2024/09/1andOne_Master_Primary_Logo.png",
					"priceRange": "$",
					"telephone": "02 6122 1400",
					"url": "https://www.1andone.com.au/",
					"openingHoursSpecification": [
						{
							"@type": "OpeningHoursSpecification",
							"dayOfWeek": [
								"Monday",
								"Tuesday",
								"Wednesday",
								"Thursday",
								"Friday"
							],
							"opens": "09:00",
							"closes": "17:00"
						}
					],
					"hasMap": "https://maps.app.goo.gl/ST1b9C9mRn892QkPA"
				}
			</script>
		@else
			<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "Organization",
					"name": "1 and One Consulting",
					"url": "https://www.1andone.com.au/",
					"logo": "https://www.1andone.com.au/wp-content/uploads/2024/09/1andOne_Master_Primary_Logo.png",
					"sameAs": [
						"https://au.linkedin.com/company/1-and-one",
						"https://www.finance.gov.au/node/4434",
						"https://buy.nsw.gov.au/supplier/profile/105189"
					]
				}
			</script>
		@endif

		@php(wp_body_open())

		<div id="app">
			<a class="skip-content" href="#main">
				{{ __('Skip to content') }}
			</a>

			@include('navigation.header.standard', [
				'header' => $header,
			])

			@yield('content')

			@include('sections.footer')

			<div data-modal-portal></div>
		</div>

		@php(do_action('get_footer'))
		@php(wp_footer())
	</body>
</html>
