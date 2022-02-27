@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-center text-danger">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 text-center text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
