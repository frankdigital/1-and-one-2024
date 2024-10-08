@php
    $baseClass = 'socials';
@endphp

<nav {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
    @if (sizeof($socials) > 0)
        @foreach ($socials as $key => $social)
            <a href="{{ $social }}" @class([ccn($baseClass, 'social-link')]) target="_blank" rel="noopener noreferrer">
                <x-contained-icon :icon="ucfirst($key)" type="social" />
            </a>
        @endforeach
    @endif
</nav>
