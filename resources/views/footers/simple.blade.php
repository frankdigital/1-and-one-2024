@php
    $baseClass = 'footer-simple';
@endphp
<footer @class([ccn($baseClass)])>
    <x-container @class([ccn($baseClass, 'container')])>
        <div @class([ccn($baseClass, 'socials-container')])>
            <div @class([ccn($baseClass, 'logo-container')])>
                <a href="{{ url('/') }}" @class([ccn($baseClass, 'logo-link')])>
                    @svg('icons.brand.LogoDark', ccn($baseClass, 'logo'))
                </a>
            </div>

            @if (sizeof($socials) > 0)
                <x-socials :socials="$socials" @class([ccn($baseClass, 'socials')]) />
            @endif

        </div>

        <div @class([ccn($baseClass, 'featured-links')])>
            @if (sizeof($featured_links) > 0)
                @foreach ($featured_links as $link)
                    @php
                        $link = $link['link'];
                    @endphp
                    <div @class([ccn($baseClass, 'featured-link-container')])>
                        <a href="{{ $link['url'] }}" @class([ccn($baseClass, 'featured-link')])>
                            <x-text as="span" textStyle="h5">
                                {{ $link['title'] }}
                            </x-text>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div @class([ccn($baseClass, 'locations')])>
            @if (sizeof($locations) > 0)
                @foreach ($locations as $location)
                    <div @class([ccn($baseClass, 'location')])>
                        <x-location-block :location="$location" />
                    </div>
                @endforeach
            @endif
        </div>

        <div @class([ccn($baseClass, 'legal-container')])>
            <div @class([ccn($baseClass, 'copyright')])>
                <x-text as="span" textStyle="body">
                    &copy; {{ date('Y') }} UI Vault
                </x-text>
            </div>

            <div @class([ccn($baseClass, 'legal-links')])>
                @if (sizeof($legals) > 0)
                    @foreach ($legals as $link)
                        @php
                            $link = $link['link'];
                        @endphp

                        <x-default-link :url="$link['url']" :title="$link['title']" :target="$link['target']" size='small' />
                    @endforeach
                @endif
            </div>
        </div>
    </x-container>
</footer>
