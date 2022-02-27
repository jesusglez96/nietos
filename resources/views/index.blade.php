<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nieto's Travels</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons%22%3E">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <x-nav></x-nav>
    {{-- <header class="py-5">
        <h1 class="text-center">
            Nieto's <span class="text-primary">Flights</span>
        </h1>
    </header>
    <!-- barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light border-top">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 fw-bold text-primary text-uppercase d-lg-none"
                href="{{ route('index') }}">Nieto's Flights</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav container d-md-row justify-content-md-between">
                    <a class="text-dark text-decoration-none " aria-current="page"
                        href="{{ route('index') }}">Inicio</a>
                    <a class="text-dark text-decoration-none " href="{{ route('show') }}">Mis Vuelos</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav> --}}
    <div class="container-xxl">
        <div class="table-responsive w-100">
            <div class="table-wrapper w-100">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Vuelos <b>Disponibles</b></h2>
                        </div>
                        @if (Auth::user()->is_admin == 1)
                            <div class="col-sm-4">
                                <a href="{{ route('create') }}" class="btn btn-info add-new">Crear Vuelo</a>
                            </div>
                        @endif
                    </div>
                </div>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Ciudad de Origen</th>
                            <th>Pais de Origen</th>
                            <th>Ciudad de Destino</th>
                            <th>Pais de Destino</th>
                            <th>Fecha</th>
                            <th>Asientos</th>
                            <th>Asientos Disponibles</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($flights as $flight)
                            {{-- <pre>
                            {{ var_dump($flight) }}
                        </pre> --}}
                            <tr>
                                <td>{{ $flight->city_origin }}</td>
                                <td>{{ $flight->country_origin }}</td>
                                <td>{{ $flight->city_destiny }}</td>
                                <td>{{ $flight->country_destiny }}</td>
                                <td>{{ $flight->date }}</td>
                                <td>{{ $flight->seat_total }}</td>
                                <td>{{ $flight->seat_available }}</td>
                                <td>{{ $flight->price }}</td>
                                <td class="text-center">
                                    @if (Auth::user()->is_admin == 1)
                                        <a href="{{ route('modify', $flight->id) }}" class="edit"
                                            title="Edit" data-toggle="tooltip"><svg style="width:24px;height:24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M16.84,2.73C16.45,2.73 16.07,2.88 15.77,3.17L13.65,5.29L18.95,10.6L21.07,8.5C21.67,7.89 21.67,6.94 21.07,6.36L17.9,3.17C17.6,2.88 17.22,2.73 16.84,2.73M12.94,6L4.84,14.11L7.4,14.39L7.58,16.68L9.86,16.85L10.15,19.41L18.25,11.3M4.25,15.04L2.5,21.73L9.2,19.94L8.96,17.78L6.65,17.61L6.47,15.29" />
                                            </svg></a>
                                        <a href="{{ route('delete', $flight->id) }}" class="delete"
                                            title="Delete" data-toggle="tooltip"><svg style="width:24px;height:24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8.46,11.88L9.87,10.47L12,12.59L14.12,10.47L15.53,11.88L13.41,14L15.53,16.12L14.12,17.53L12,15.41L9.88,17.53L8.47,16.12L10.59,14L8.46,11.88M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" />
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{ route('buy', $flight->id) }}"
                                            @if ($flight->seat_available <= 0) class="isDisabled" @else class="buy" @endif
                                            title="buy" data-toggle="tooltip"><svg style="width:24px;height:24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M10,0V4H8L12,8L16,4H14V0M1,2V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18Z" />
                                            </svg></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
