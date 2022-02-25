<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hola</h1>
    @php
        var_dump($flights);
        echo '<pre>';
        var_dump(Auth::user()->getAuthIdentifier());
        echo '</pre>';
    @endphp
</body>

</html>
