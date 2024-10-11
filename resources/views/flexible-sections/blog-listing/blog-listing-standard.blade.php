@php
	$baseClass = 'blog-listing-standard';
@endphp

<x-section :darkerBg="$darkerBg" :contain="false" @class([ccn($baseClass), ccn($baseClass . '--' . $columnsCount)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div data-blog-listing>
			<x-section-wrap :content="$content">
				@if (isset($content['posts']) && sizeof($content['posts']))
					<div @class([ccn($baseClass, 'grid')])>
						@foreach ($content['posts'] as $key => $postGroup)
							<div data-blog-listing-pagination-target="{{ $key }}" @class([ccn($baseClass, 'grid-group')])>
								@foreach ($postGroup as $post)
									<x-card-blog :id="$post->ID" :hideDate="$content['hide_date']" :variant="$columnsCount === 'two_columns' ? 'large' : 'default'" />
								@endforeach
							</div>
						@endforeach
					</div>
				@endif
			</x-section-wrap>

			@if (isset($content['toggle_pagination']) && sizeof($content['posts']) > 1)
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
