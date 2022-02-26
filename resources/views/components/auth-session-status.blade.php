@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-center text-green']) }}>
        {{ $status }}
    </div>
@endif
