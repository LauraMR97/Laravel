<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Respuesta</title>
</head>
<body>
    <center>
    <h1>Crear respuesta:</h1>

    <form action="crearRespuesta" method="post">
        {{ csrf_field() }}
        <textarea name="resp" rows="5" cols="50" placeholder="Escriba la respuesta"></textarea><br>
        <input type="submit" name="addRespuesta" value="Añadir Respuesta">
        <input type="submit" name="volver" value="volver">
    </form>
</center>
</body>
</html>
