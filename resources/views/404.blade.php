@extends('layouts.app')

@section('content')
	@php
		$baseClass = 'four-oh-four';
	@endphp

	<x-section @class([ccn($baseClass)])>
		<div @class([ccn($baseClass, 'gradient')])></div>
		<x-container @class([ccn($baseClass, 'container')])>

			<div @class([ccn($baseClass, 'content-container')])>
				<div @class([ccn($baseClass, 'content')])>
					<x-text textStyle="display" as="h1">Oops! Something went wrong</x-text>
					<x-text textStyle="bodyLarge" as="span">The page you are looking for doesn't exist or has been moved</x-text>
				</div>

				<x-cta-container :fullWidth="true" @class([ccn($baseClass, 'cta-container')])>
					<x-cta classes="" priority="primary" :cta="$cta" />
				</x-cta-container>
			</div>

		</x-container>
	</x-section>

	@include('footers.footer', [
		'footer' => $footer,
		'type' => 'simple',
	])
@endsection
