<div class="card d-flex flex-column justify-content-center align-items-center w-100 h-100">
    <div class="card-img-top w-100 h-100 position-relative">
        {{ $logo }}
    </div>

    <div class="card-body position-absolute top-0 mt-5 w-25">
        {{ $slot }}
    </div>
</div>
