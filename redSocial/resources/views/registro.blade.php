<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>

<body>
    <center>
        <h1>Login:</h1>

        <form action="registrando" method="post">
            {{ csrf_field() }}
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="" placeholder="Nombre"><br>
            <label>Correo:</label><br>
            <input type="email" name="correo" value="" placeholder="Correo"><br>
            <label>Edad:</label><br>
            <input type="number" name="edad" value="" placeholder="Edad"><br>
            <label>Contraseña:</label><br>
            <input type="password" name="password" value="" placeholder="Contraseña"><br><br>
            <input type="submit" value="Registrar" name="registrar">
            <input type="submit" value="Volver" name="volver">
        </form>
    </center>
</body>

</html>
