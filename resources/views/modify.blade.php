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
    <link rel="stylesheet" href="css/index.css">
    <style>
        header {
            background-image: url("../../img/6.jpg");
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover;
        }

        body {
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

    </style>
    {{-- <style>
        header {
            background-image: url("img/4.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        body {
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

    </style> --}}
</head>

<body>
    <x-nav></x-nav>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('modificado') == true)
        <div class="alert alert-success text-center">
            <span>Vuelo modificado con exito!</span>
        </div>
    @elseif (session('modificado') != null && session('modificado') == false)
        <div class="alert alert-danger text-center">
            <span class="text-center">Error al modificar vuelo</span>
        </div>
    @endif
    <div class="container mt-8">
        <h1 class="text-center mb-5">Modificar Vuelo</h1>
        <form action="{{ route('edit') }}" method="post" class="w-75 mx-auto">
            @csrf
            <input type="hidden" name="id_flight" value="{{ $flight->id }}">
            <!-- Origen y destino -->
            <div class="row mb-4 ">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="city_origin">Origen</label>
                        <input type="text" id="city_origin" name="city_origin" class="form-control"
                            value="{{ $flight->city_origin }}" />
                        {{-- @error('city_origin')
                        <br>
                        <small>*{{$menssage}}</small>
                        <br>s
                        @enderror --}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="country_origin">Pais de Origen</label>
                        <input type="text" id="country_origin" name="country_origin" class="form-control"
                            value="{{ $flight->country_origin }}" />
                    </div>
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="city_destiny">Destino</label>
                        <input type="text" id="city_destiny" name="city_destiny" class="form-control"
                            value="{{ $flight->city_destiny }}" />
                    </div>

                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="country_destiny">Pais de Destino</label>
                        <input type="text" id="country_destiny" name="country_destiny" class="form-control"
                            value="{{ $flight->country_destiny }}" />
                    </div>
                </div>
            </div>

            <!-- Fecha input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="date">Fecha</label>
                <input type="datetime-local" id="date" name="date" class="form-control"
                    value="{{ $flight->date }}" />
            </div>

            <!-- Asientos Totales input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="seat_total">Asientos Totales</label>
                <input type="number" id="seat_total" name="seat_total" class="form-control"
                    value="{{ $flight->seat_total }}" />
            </div>

            <!-- Asientos disponibles input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="seat_available">Asientos Disponibles</label>
                <input type="number" id="seat_available" name="seat_available" class="form-control"
                    value="{{ $flight->seat_available }}" />
            </div>

            <!-- Precio input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="price">Precio</label>
                <input type="number" step="0.01" id="price" name="price" class="form-control"
                    value="{{ $flight->price }}" />


            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn w-100 btn-dark btn-block mb-4">Modificar Vuelo</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
