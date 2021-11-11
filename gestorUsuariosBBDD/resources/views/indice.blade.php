<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indice</title>
</head>

<body>

    <center>
        <h1>GESTOR DE USUARIOS:</h1>
        <h2>Alumnos:</h2>
        <hr>
        <form action="delAlumno" method="post">
            {{ csrf_field() }}

        </form>

        <h2>Profesores:</h2>
        <hr>
            <form action="delProfesor" method="post">
                {{ csrf_field() }}
            </form><br>
        <hr>
        <form action="gestion" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Añadir Persona" name="Persona">
            <input type="submit" value="Borrar todas las Personas" name="Borrar">
            <input type="submit" value="Gestionar Personas" name="GestionarPersonas">
            <input type="submit" value="Gestionar Roles" name="GestionarRoles">
        </form><br>

        <form action="generar" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Union" name="Union">
            <input type="submit" value="Interseccion" name="Intersect">
            <input type="submit" value="Cardinalidad" name="Cardinalidad">
            <input type="text" value="" name="Persona" placeholder="introduce una persona">
            <input type="submit" value="Pertenece" name="Pertenece"><br><br>
            <textarea name="descripcion" cols="40" rows="5"><?php if (isset($solucion)) {
    echo $solucion;
} else {
    echo '';
} ?></textarea>

        </form>
    </center>

</body>

</html>
