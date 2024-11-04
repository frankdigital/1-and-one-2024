@php
	$baseClass = 'page-cards';
@endphp

<x-section :contain="false" :scrollId="$section['scroll_id']" @class([ccn($baseClass), ccn($baseClass . '--' . $columnsCount)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div data-blog-listing>
			<x-section-wrap :content="$content">
				@if (isset($content['pages']) && sizeof($content['pages']))
					<div @class([ccn($baseClass, 'grid')])>
						@foreach ($content['pages'] as $key => $postGroup)
							<div data-blog-listing-pagination-target="{{ $key }}" @class([ccn($baseClass, 'grid-group')])>
								@foreach ($postGroup as $post)
									<div data-transition-target>
										<x-page-card :id="$post" />
									</div>
								@endforeach
							</div>
						@endforeach
					</div>
				@endif
			</x-section-wrap>

			@if (isset($content['toggle_pagination']) && sizeof($content['pages']) > 1)
				<div @class([ccn($baseClass, 'pagination-container')])>
					<nav @class([ccn($baseClass, 'pagination')])>
						@foreach ($content['pages'] as $key => $postGroup)
							<button data-blog-listing-pagination-trigger="{{ $key }}" @class([ccn($baseClass, 'pagination-button')])><x-text
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
