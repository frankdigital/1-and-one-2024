{{--
  Template Name: Front Page Template
--}}

@extends('layouts.app')

@section('content')
	@while (have_posts())
		@php(the_post())

		@include('heroes.primary.hero', [
			'type' => 'standard',
			'hero' => $hero,
		])

		@include('partials.flexible-sections', [
			'sections' => $flexibleSections,
		])

		@include('footers.footer', [
			'footer' => $footer,
			'type' => 'simple',
		])
	@endwhile
@endsection
