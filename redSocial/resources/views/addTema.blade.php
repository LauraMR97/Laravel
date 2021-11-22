<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Tema</title>
</head>
<body>
    <center>
    <h1>Añadir tema:</h1>
    <form action="addTema" method="post">
        {{ csrf_field() }}
        <label>Nombre del Tema</label><br>
        <input type="text" name="nombre" value="" placeholder="nombre del tema"><br>
        <label>Edad Minima</label><br>
        <input type="text" name="edad" value="" placeholder="edad minima permitida"><br><br>
        <input type="submit" name="add" value="Añadir">
        <input type="submit" name="volver" value="volver">
    </form>
</center>
</body>
</html>
