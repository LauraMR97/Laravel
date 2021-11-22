<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <center>
        <h1>Login:</h1>

        <form action="loggear" method="post">
            {{ csrf_field() }}
            <label>Correo:</label><br>
            <input type="email" name="correo" value="" placeholder="Correo"><br>
            <label>Contraseña:</label><br>
            <input type="password" name="password" value="" placeholder="Contraseña"><br><br>
            <input type="submit" value="Aceptar" name="aceptar">
            <input type="submit" value="Registrate" name="registro">
        </form>
    </center>
</body>

</html>
