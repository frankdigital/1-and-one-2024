@extends('layouts.app')

@section('content')
	@while (have_posts())
		@php(the_post())

		@include('heroes.secondary.hero', [
			'type' => 'standard',
			'hero' => $hero,
		])

		<main id="main" class="main">
			@include('partials.flexible-sections', [
				'sections' => $flexibleSections,
			])
		</main>

		@include('footers.footer', [
			'footer' => $footer,
			'type' => 'simple',
		])
	@endwhile
@endsection
