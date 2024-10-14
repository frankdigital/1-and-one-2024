@php
	$baseClass = 'breadcrumbs';
@endphp

<nav aria-label="Breadcrumb" @class([ccn($baseClass)])>
	<ul @class([ccn($baseClass, 'list')])>
		@foreach ($links as $breadcrumb)
			@include('ui.breadcrumbs.breadcrumb', ['breadcrumb' => $breadcrumb])
		@endforeach
	</ul>
</nav>
