@php
    $baseClass = 'wysiwyg-text-block';
@endphp
<x-wysiwyg @class([ccn($baseClass), $class]) :wysiwyg="$block['wysiwyg']" />
