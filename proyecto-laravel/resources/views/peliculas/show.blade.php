<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Películas</title>
</head>
<body>
    <h1>Películas</h1>
    <ul>
        @foreach ($peliculas as $pelicula)
        <li>
            <p>{{ $pelicula->titulo}}, {{$pelicula->ano}}</p>
        </li>
        @endforeach
    </ul>
    
</body>
</html>