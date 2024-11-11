@php
	$baseClass = 'footer-simple';
@endphp

<footer @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>

		<div @class([ccn($baseClass, 'sidebar-container')])>
			<div @class([ccn($baseClass, 'sidebar')])>
				<div @class([ccn($baseClass, 'logo-container')])>
					<a href="{{ url('/') }}" @class([ccn($baseClass, 'logo-link')])>
						<span class="sr-only">1 and One</span>
						@svg('icons.brand.LogoDark', ccn($baseClass, 'logo'))
					</a>
				</div>

				@if (sizeof($socials) > 0)
					<div @class([
						ccn($baseClass, 'socials'),
						ccn($baseClass, 'socials--mobile'),
					])>
						<x-socials :socials="$socials" @class([ccn($baseClass, 'socials')]) />
					</div>
				@endif

				<div @class([ccn($baseClass, 'content-container')])>
					@php
						$showCta = is_cta_enabled($ctaContent['primary_cta']) || is_cta_enabled($ctaContent['secondary_cta']);
					@endphp

					<div @class([ccn($baseClass, 'content')])>
						@if (isset($ctaContent['heading']))
							<x-text as="span" textStyle="h5">
								{{ $ctaContent['heading'] }}
							</x-text>
						@endif

						@if (isset($ctaContent['content']))
							<x-text as="span" textStyle="bodySmall">
								{{ $ctaContent['content'] }}
							</x-text>
						@endif
					</div>

					@if ($showCta)
						<x-cta-container :fullWidth="true" @class([ccn($baseClass, 'cta-container')])>
							<x-cta size="small" priority="primary" :icon="null" :cta="$ctaContent['primary_cta']" />
							<x-cta size="small" priority="secondary" :icon="null" :cta="$ctaContent['secondary_cta']" />
						</x-cta-container>
					@endif
				</div>

			</div>

			@if (sizeof($socials) > 0)
				<div @class([
					ccn($baseClass, 'socials'),
					ccn($baseClass, 'socials--desktop'),
				])>
					<x-socials :socials="$socials" @class([ccn($baseClass, 'socials')]) />
				</div>
			@endif
		</div>

		<div @class([ccn($baseClass, 'featured-links')])>
			@if (sizeof($featured_links) > 0)
				@foreach ($featured_links as $link)
					@php
						$link = $link['link'];
					@endphp
					<div @class([ccn($baseClass, 'featured-link-container')])>
						<a href="{{ $link['url'] }}" @class([ccn($baseClass, 'featured-link')])>
							<x-text as="span" textStyle="h4">
								{{ $link['title'] }}
							</x-text>
						</a>
					</div>
				@endforeach
			@endif
		</div>

		<div @class([ccn($baseClass, 'locations')])>
			@if (sizeof($locations) > 0)
				@foreach ($locations as $location)
					<div @class([ccn($baseClass, 'location')])>
						<x-location-block :location="$location" />
					</div>
				@endforeach
			@endif
		</div>

		<div @class([ccn($baseClass, 'legal-container')])>
			<div @class([ccn($baseClass, 'copyright')])>
				<x-text as="span" textStyle="bodySmall">
					&copy; {{ date('Y') }} 1 and One. All rights reserved.
				</x-text>
			</div>

			<div @class([ccn($baseClass, 'legal-links')])>
				@if (sizeof($legals) > 0)
					@foreach ($legals as $link)
						@php
							$link = $link['link'];
						@endphp

						<x-default-link :url="$link['url']" :title="$link['title']" :target="$link['target']" size='small' />
					@endforeach
				@endif
			</div>
		</div>
	</x-container>
</footer>
