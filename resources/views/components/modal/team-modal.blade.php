@php
    $baseClass = 'team-modal';
@endphp

<div @class([ccn($baseClass)])>
    @if (isset($content['image']) && is_image_valid($content['image']))
        <div @class([ccn($baseClass, 'header')])>
            <div @class([ccn($baseClass, 'image-container')])>
                <x-image :rounded="true" :fill="true" :image="$content['image']" :size="[600, 0]"
                    @class([ccn($baseClass, 'image')]) />
            </div>
        </div>
    @endif

    <div @class([ccn($baseClass, 'content-container')])>
        <div @class([ccn($baseClass, 'content')])>
            <div @class([ccn($baseClass, 'meta-container')])>
                <div @class([ccn($baseClass, 'meta')])>
                    <x-text as="h3">
                        {{ $content['name'] }}
                    </x-text>

                    <x-text as="body">
                        {{ $content['position'] }}
                    </x-text>
                </div>

                <div @class([ccn($baseClass, 'contact')])>
                    <div @class([ccn($baseClass, 'traditional-container')])>
                        @if (isset($content['phone']))
                            <div @class([
                                ccn($baseClass, 'link-container'),
                                ccn($baseClass, 'link-container--phone'),
                            ])>
                                <a @class([ccn($baseClass, 'link')]) href="tel:{{ $content['phone'] }}">
                                    <x-contained-icon icon="Phone" size="small" />
                                </a>
                            </div>
                        @endif
                        @if (isset($content['email']))
                            <div @class([
                                ccn($baseClass, 'link-container'),
                                ccn($baseClass, 'link-container--email'),
                            ])>
                                <a @class([ccn($baseClass, 'link')]) href="mailto:{{ $content['email'] }}">
                                    <x-contained-icon icon="Email" size="small" />
                                </a>
                            </div>
                        @endif
                    </div>

                    @if (isset($content['linkedin']))
                        <div @class([ccn($baseClass, 'social-container')])>
                            <div @class([
                                ccn($baseClass, 'link-container'),
                                ccn($baseClass, 'link-container--linkedin'),
                            ])>
                                <a @class([ccn($baseClass, 'link')]) href="{{ $content['linkedin'] }}">
                                    <x-contained-icon type="social" icon="Linkedin" size="small" />

                                    <x-text textStyle="caption">
                                        Connect on LinkedIn
                                    </x-text>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <div @class(ccn($baseClass, 'bio'))>
                @if (isset($content['description']))
                    <x-wysiwyg :wysiwyg="$content['description']" />
                @endif
            </div>
        </div>

    </div>
</div>
