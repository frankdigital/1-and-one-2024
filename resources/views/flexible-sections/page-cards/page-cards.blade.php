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
										@if ($contentType === 'pages')
											<x-page-card :id="$post" />
										@endif

										@if ($contentType === 'manual')
											@php
												$baseClass = 'page-card';
											@endphp

											<article @class([ccn($baseClass), ccn($baseClass . '--manual')]) title="{!! $post['heading'] !!}">
												@isset($post['image'])
													<div @class([ccn($baseClass, 'image-container')])>
														<x-image :image="$post['image']" :fill="true" :size="[588, 360]" @class([ccn($baseClass, 'image')]) />
													</div>
												@endisset
												<div @class([ccn($baseClass, 'content-container')])>
													<div @class([ccn($baseClass, 'content')])>
														@isset($post['heading'])
															<x-text @class([ccn($baseClass, 'heading')]) as="h4">
																{!! $post['heading'] !!}
															</x-text>
														@endisset

														@isset($post['description'])
															<x-text @class([ccn($baseClass, 'description')]) as="body" :isHTML="true">
																{!! $post['description'] !!}
															</x-text>
														@endisset
													</div>

												</div>
											</article>
										@endif
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
