@props(['name', 'solid' => false])

@php
$variant = $solid ? 'solid' : 'outline';
$size = $solid ? '20' : '24';

$path = base_path("node_modules/heroicons/{$size}/{$variant}/{$name}.svg");

$svg = '';
if (file_exists($path)) {
    $svg = file_get_contents($path);
}
@endphp

@if($svg)
    {!! str_replace('<svg', '<svg ' . $attributes, $svg) !!}
@endif
