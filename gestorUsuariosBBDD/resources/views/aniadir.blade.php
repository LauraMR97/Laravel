<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD</title>
</head>

<body>
    <center>
    <h1>AÑADIR NUEVO USUARIOS:</h1>
    <form action="crear" method="post">
        {{ csrf_field() }}
        <label>Nombre</label>
        <input type="text" value="" name="Nombre"><br>
        <label>Apellido</label>
        <input type="text" value="" name="Apellido"><br>
        <label>Edad</label>
        <input type="number" value="" name="Edad"><br><br>
        <input type="checkbox" name="tipousur[]" value="Profesor">Profesor
        <input type="checkbox" name="tipousur[]" value="Alumno">Alumno
        <input type="checkbox" name="tipousur[]" value="Conserje">Conserje<br>
        <input type="submit" value="ADD" name="ADD">
        <input type="submit" value="Volver" name="Volver">
    </form>
</center>
</body>

</html>
