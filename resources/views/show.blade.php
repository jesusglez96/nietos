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
    <style>
        header {
            background-image: url("../../img/5.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

    </style>
</head>

<body>
    <x-nav></x-nav>
    @if (session('remove') == true)
        <div class="alert alert-success text-center">
            <span>Vuelo eliminado con exito!</span>
        </div>
    @elseif (session('remove') != null && session('remove') == false)
        <div class="alert alert-danger text-center">
            <span class="text-center">Error al eliminar vuelo</span>
        </div>
    @endif
    <div class="container-xxl">
        <div class="table-responsive w-100">
            <div class="table-wrapper w-100">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Vuelos <b>Comprados</b></h2>
                        </div>
                        {{-- <div class="col-sm-4">
                            <button href="{{ route('create') }}" type="button" class="btn btn-info add-new"><i
                                    class="fa fa-plus"></i> Add New</button>
                    </div> --}}
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
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($travels as $travel)
                            {{-- <pre>
                            {{ var_dump($travel) }}
                        </pre> --}}
                            <tr>
                                <td>{{ $travel->city_origin }}</td>
                                <td>{{ $travel->country_origin }}</td>
                                <td>{{ $travel->city_destiny }}</td>
                                <td>{{ $travel->country_destiny }}</td>
                                <td>{{ $travel->date }}</td>
                                <td>{{ $travel->price }}</td>
                                <td class="text-center">
                                    <a href="{{ route('remove', $travel->travel_id) }}" class="delete"
                                        title="Delete" data-toggle="tooltip"><svg style="width:24px;height:24px"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8.46,11.88L9.87,10.47L12,12.59L14.12,10.47L15.53,11.88L13.41,14L15.53,16.12L14.12,17.53L12,15.41L9.88,17.53L8.47,16.12L10.59,14L8.46,11.88M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" />
                                        </svg>
                                    </a>
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
