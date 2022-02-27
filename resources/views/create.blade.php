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
    <style>
        header {
            background-image: url("../img/4.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        body {
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        small{
            color: red;
        }
    </style>
</head>

<body>
    <x-nav></x-nav>
    <div class="container mt-8">
        <h1 class="text-center mb-5">Añadir Nuevo Vuelo</h1>
        <form action="{{ route('store') }}" method="post" class="w-75 mx-auto">
            @csrf
            <!-- Origen y destino -->
            <div class="row mb-4 ">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="city_origin">Origen</label>
                        <input type="text" id="city_origin" name="city_origin" class="form-control" value="{{old('city_origin')}}" />
                        @error('city_origin') 
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="country_origin">Pais de Origen</label>
                        <input type="text" id="country_origin" name="country_origin" class="form-control" value="{{old('country_origin')}}"/>
                        @error('country_origin') 
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="city_destiny">Destino</label>
                        <input type="text" id="city_destiny" name="city_destiny" class="form-control" value="{{old('city_destiny')}}"/>
                        @error('city_destiny') 
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="country_destiny">Pais de Destino</label>
                        <input type="text" id="country_destiny" name="country_destiny" class="form-control" value="{{old('country_destiny')}}"/>
                        @error('country_destiny') 
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Fecha input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="date">Fecha</label>
                <input type="datetime-local" id="date" name="date" class="form-control" value="{{old('date')}}"/>
                @error('date') 
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
            </div>

            <!-- Asientos input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="seat_total">Asientos</label>
                <input type="number" id="seat_total" name="seat_total" class="form-control" value="{{old('seat_total')}}"/>
                @error('seat_total') 
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
            </div>

            {{-- <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example5">Asientos Disponible</label>
                  <input type="number" id="form6Example5" name="seat_available" class="form-control"  value="{{old('seat_available')}}" />
                @error('seat_available') 
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
                </div> --}}

            <!-- Precio input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="price">Precio</label>
                <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{old('price')}}"/>
                @error('price') 
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" id="submit" class="btn btnw-100 btn-dark btn-block mb-4">Agregar Vuelo</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
