<span class="{{ $getCtaStyles() }}">
    @if ($label)
        <span class="{{ $getLabelStyles() }}">
            {!! $label !!}
        </span>
    @endif

    @if ($icon)
        <span class="{{ $getIconStyles() }}">
            {{-- You may have an IconHandler component to render the icon --}}
            {{-- <x-icon-handler :icon="$icon" /> --}}
        </span>
    @endif
</span>
