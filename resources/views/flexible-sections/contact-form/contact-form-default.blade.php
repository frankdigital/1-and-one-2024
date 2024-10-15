@php
	$baseClass = 'contact-form';
	$telephoneLink = 'tel:' . $telephone['number'];
	$emailLink = 'mailto:' . $email;
@endphp
<x-section :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'content-container')])>
			<div @class([ccn($baseClass, 'content')])>
				@if (isset($content['eyebrow']) && !empty($content['eyebrow']))
					<x-text as="eyebrow">
						{{ $content['eyebrow'] }}
					</x-text>
				@endif

				@if (isset($content['heading']) && !empty($content['heading']))
					<x-text as="h3">
						{!! $content['heading'] !!}
					</x-text>
				@endif

				@if (isset($content['description']) && !empty($content['description']))
					<x-text as="body" isHTML='true' @class([ccn($baseClass, 'description')])>
						{!! $content['description'] !!}
					</x-text>
				@endif
			</div>

			@if ($address || $email || $telephone)
				<div @class([ccn($baseClass, 'contact')])>
					@if (isset($address))
						<x-contact-item icon='Location' @class([ccn($baseClass, 'contact-item')])>
							<x-text as="span" textStyle="body" :strong="true" @class([ccn($baseClass, 'contact-item-heading')])>
								{!! $name !!}
							</x-text>

							<div>{!! $address !!}</div>
						</x-contact-item>
					@endif

					@if (isset($email) && !empty($emailLink))
						<x-contact-item icon='Email' @class([ccn($baseClass, 'contact-item')])>
							<x-default-link :url="$emailLink" :title="$email" target="_self" icon='Phone' />
						</x-contact-item>
					@endif

					@if (isset($telephone['formatted_number']) && isset($telephone['number']) && isset($telephoneLink))
						<x-contact-item icon='Phone' @class([ccn($baseClass, 'contact-item')])>
							<x-default-link :url="$telephoneLink" :title="$telephone['formatted_number']" target="_self" />
						</x-contact-item>
					@endif
				</div>
			@endif

			@if (sizeof($socials) > 0)
				<x-socials :socials="$socials" @class([ccn($baseClass, 'socials')]) />
			@endif
		</div>

		@if (isset($content['form']) && !empty($content['form']))
			<div @class([ccn($baseClass, 'form')])>
				{!! gravity_form($content['form']) !!}
				<div @class([ccn($baseClass, 'actions')])>
					<x-cta :cta="$homeCta" />
					<x-cta priority="secondary" :cta="$reloadCta" />
				</div>
			</div>
		@endif
	</x-container>
</x-section>
