<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <h1>Bienvenido a la página de inicio</h1>

    <form action="/store" method="post">
        @csrf
        <input type="text" name="issan" placeholder="Issan de la película"><br><br>
        <input type="text"  name="titulo" placeholder="Título de la película"><br><br>
        <input type="text" name="ano" placeholder="Año de la película"><br><br>
        <input type="text" name="director" placeholder="Director de la película"><br><br>

        <input type="submit" value=" Agregar Película"><br><br>
        <a href="/list">Ver lista de películas</a>
    </form>
</body>
</html>
