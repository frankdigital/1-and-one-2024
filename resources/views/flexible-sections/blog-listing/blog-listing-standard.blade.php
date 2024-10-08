@php
	$baseClass = 'blog-listing-standard';
@endphp

<x-section @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div data-blog-listing>
			@if (isset($content['posts']) && sizeof($content['posts']))
				<div @class([ccn($baseClass, 'grid')])>
					@foreach ($content['posts'] as $key => $postGroup)
						<div data-blog-listing-pagination-target="{{ $key }}" @class([ccn($baseClass, 'grid-group')])>
							@foreach ($postGroup as $post)
								<x-card-blog :id="$post->ID" />
							@endforeach
						</div>
					@endforeach
				</div>
			@endif

			@if (isset($content['toggle_pagination']))
				<div @class([ccn($baseClass, 'pagination-container')])>
					<nav @class([ccn($baseClass, 'pagination')])>
						@foreach ($content['posts'] as $key => $postGroup)
							<button data-blog-listing-pagination-trigger="{{ $key }}" @class([
								ccn($baseClass, 'pagination-button'),
								ccn($baseClass, 'pagination-button--active'),
							])><x-text
									textStyle="bodySmall" as="span" @class([ccn($baseClass, 'pagination-label')])>{{ $key + 1 }}</x-text></button>
						@endforeach
					</nav>

					<div @class([ccn($baseClass, 'pagination-next-container')])>
						<button data-blog-listing-pagination-next @class([ccn($baseClass, 'pagination-next')])>Next</button>
					</div>
				</div>
			@endif
		</div>
	</x-container>
</x-section>
