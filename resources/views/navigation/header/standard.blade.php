@php
	$baseClass = 'header';
@endphp

<header data-header @class(ccn($baseClass))>
	<x-container width="header" @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'wrapper')])>
			<div id="logo-reference" @class([ccn($baseClass, 'logo-container')])>
				<a href="{{ url('/') }}">
					@svg('icons.brand.LogoDark', ccn($baseClass, 'logo'))
				</a>
			</div>

			<div @class([
				ccn($baseClass, 'navigation'),
				ccn($baseClass, 'navigation--primary'),
			])>
				<x-responsive-menu :menu="$content['menu']" />
			</div>
		</div>

		<div @class([ccn($baseClass, 'actions-container')])>
			<div @class([ccn($baseClass, 'cta-container')])>
				@if (is_cta_enabled($content['secondary_cta']))
					<x-cta classes="" size="small" priority="text-link" :cta="$content['secondary_cta']" />
				@endif
				@if (is_cta_enabled($content['primary_cta']))
					<x-cta classes="" size="small" priority="primary" :cta="$content['primary_cta']" />
				@endif
			</div>

			<button data-header-mobilemenu-trigger @class([
				ccn($baseClass, 'hamburger'),
				ccn($baseClass, 'action-button'),
				ccn($baseClass, 'action-button--menu'),
			])>
				<span class="top"></span>
				<span class="middle"></span>
				<span class="middle-reverse"></span>
				<span class="bottom"></span>
			</button>
		</div>
	</x-container>

	<div data-header-megamenu @class([ccn($baseClass, 'mega-menu')])>
		<x-animate-height>
			@include('navigation.megamenu.callout', [
				'menu' => $content['menu'],
			])
		</x-animate-height>
	</div>

	<div data-header-mobilemenu @class([ccn($baseClass, 'mobile-menu')])>
		@include('navigation.mobile-menu.default', [
			'content' => [
				'menu' => $content['menu'],
				'smallLinks' => $content['smallLinks'],
				'primary_cta' => $content['primary_cta'],
				'secondary_cta' => $content['secondary_cta'],
			],
		])
	</div>
</header>

<div data-header-overlay @class([ccn($baseClass, 'overlay')])></div>
