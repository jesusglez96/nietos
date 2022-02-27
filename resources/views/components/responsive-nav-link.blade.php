@props(['active'])

@php
$classes = $active ?? false ? 'd-block pl-3 pr-4 py-2 text-center fs-2 text-dark bg-warning' : 'd-block pl-3 pr-4 py-2 text-center fs-2 text-Secondary bg-warning';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
