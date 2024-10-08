@php
    $baseClass = 'team-default';
@endphp

<x-section @class([ccn($baseClass)])>
    <x-container @class([ccn($baseClass, 'container')])>
        <x-section-wrap :content="$content">
            <div @class([ccn($baseClass, 'grid')])>
                @isset($content['team'])
                    @foreach ($content['team'] as $teamMember)
                        <div @class([ccn($baseClass, 'tile')])>
                            <x-team-tile :post="$teamMember" />
                        </div>
                    @endforeach
                @endisset
            </div>
        </x-section-wrap>
    </x-container>
</x-section>
