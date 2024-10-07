<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>
<body>
    <h3>Regístrate:</h3>
    <form action="registro.php" method="post">
        <label>Nombre</label><br>
        <input type="text" name="nombre"> <br><br><br>

        <label>Contraseña: </label> <br> 
        <input type="password" name="contraseña"><br><br><br>
           
        <label>Repetir Contraseña: </label> <br> 
        <input type="password" name="contraseña"><br><br><br>

        <input type="submit" value="Enviar" name="registro">


    </form><br><br>

    <form action="login.php" method="post">
        <h3>Iniciar Sesión</h3>
        <label>Nombre:</label><br>
        <input type="text" name="nombre"> <br><br><br>

        <label>Contraseña: </label> <br> 
        <input type="password" name="contraseña"><br><br><br>
           

        <input type="submit" value="Enviar" name="login">


    </form>
</body>
</html>