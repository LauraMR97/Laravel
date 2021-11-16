<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDITAR</title>
</head>

<body>
    <center>
        <?php
        $persona = Conexion::buscarPersonaCompletaPorNombre($nombre, $apellido);
        session()->put('perAnt', $persona);
        $ID_Persona = Conexion::obtenerIDConcreto($nombre, $apellido);
        $rol = Conexion::verRolPersona($ID_Persona);

        ?>
        <h1>Editar usuarios:</h1>
        <form action="editar" method="post">
            {{ csrf_field() }}
            <label>Nombre</label>
            <input type="text" value="<?php if (isset($nombre)) {
    echo $nombre;
} else {
    echo '';
} ?>" name="nombre"><br>

            <label>Apellido</label>
            <input type="text" value="<?php if (isset($apellido)) {
    echo $apellido;
} else {
    echo '';
} ?>" name="apellido"><br>

            <label>Edad</label>
            <input type="number" value="<?php if (isset($edad)) {
    echo $edad;
} else {
    echo 0;
} ?>" name="edad"><br>
            <input type="checkbox" name="tipousur[]" <?php echo (isset($rol[0]) && $rol[0]->id_rol == 1) || (isset($rol[1]) && $rol[1]->id_rol == 1) || (isset($rol[2]) && $rol[2]->id_rol == 1) ? ' checked' : ' '; ?> value="Profesor">Profesor
            <input type="checkbox" name="tipousur[]" <?php echo (isset($rol[0]) && $rol[0]->id_rol == 2) || (isset($rol[1]) && $rol[1]->id_rol == 2) || (isset($rol[2]) && $rol[2]->id_rol == 2) ? ' checked' : ' '; ?> value="Alumno">Alumno
            <input type="checkbox" name="tipousur[]" <?php echo (isset($rol[0]) && $rol[0]->id_rol == 3) || (isset($rol[1]) && $rol[1]->id_rol == 3) || (isset($rol[2]) && $rol[2]->id_rol == 3) ? ' checked' : ' '; ?> value="Conserje">Conserje
            <input type="submit" value="EDITAR" name="editar">
            <input type="submit" value="Volver" name="Volver">
        </form>
    </center>
</body>

</html>
