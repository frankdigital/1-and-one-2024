@if ($isHTML)
    <div class="{{ $sizeClass }} {{ $class }}">
        {!! $slot !!}
    </div>
@else
    <{{ $tag }} class="{{ $sizeClass }} {{ $class }}">
        {{ $slot }}
        </{{ $tag }}>
@endif
