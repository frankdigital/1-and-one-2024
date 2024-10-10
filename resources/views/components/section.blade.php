@php
	$baseClass = 'section';
@endphp

<section
	{{ $attributes->merge([
	    'class' =>
	        ccn($baseClass) .
	        ' ' .
	        ($darkerBg ? ccn($baseClass . '--darker') : '') .
	        ' ' .
	        $class .
	        ' ' .
	        $paddingClass .
	        ' ' .
	        ($dark ? 'dark' : '') .
	        ' ' .
	        ($contain ? ccn($baseClass, 'contain') : ''),
	]) }}>
	{{ $slot }}
</section>
