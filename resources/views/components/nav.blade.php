<header class="d-grid py-5">
    <div class="row align-items-center">
        <h1 class="col-6 col-start-2 text-center text-white fs-1">
            Nieto's <span class="text-warning">Flights</span>
        </h1>
        <h3 class="col text-center text-white fs-3">Bienvenido <span
                class="text-warning">{{ Str::ucfirst(Auth::user()->name) }}</span></h3>

    </div>


</header>
<!-- barra de navegacion -->
<nav class="navbar navbar-expand-lg navbar-light border-top">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-bold text-primary text-uppercase d-lg-none" href="{{ route('index') }}">Nieto's
            Flights</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav container d-md-row justify-content-md-between">
                <a class="text-dark text-decoration-none " aria-current="page" href="{{ route('index') }}">Inicio</a>
                @if (Auth::user()->is_admin != 1)
                    <a class="text-dark text-decoration-none " href="{{ route('show') }}">Mis Vuelos</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="btn btn-outline-danger text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
