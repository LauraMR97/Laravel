<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indice</title>
</head>

<body>
<?php
$alumnos=Conexion::verAlumnos();
$profesores=Conexion::verProfesores();
$conserjes=Conexion::verConserjes();
?>
    <center>
        <h1>CRUD DE USUARIOS:</h1>
        <h2>Alumnos:</h2>
        <hr>
        <form action="Alumno" method="post">
            {{ csrf_field() }}
            <?php
            foreach ($alumnos as $alumno) {
                ?>
                <label>Nombre:</label>
                <input type="text" value="<?php echo $alumno->nombre ?>" name="nombre" readonly>
                <label>Apellido:</label>
                <input type="text" value="<?php echo $alumno->apellido ?>" name="apellido" readonly>
                <label>Edad:</label>
                <input type="text" value="<?php echo $alumno->edad ?>" name="edad" readonly>
                <input type="submit" value="X" name="Eliminar">
                <input type="submit" value="E" name="Editar"><br>
                <?php
            }
            ?>
        </form>

        <h2>Profesores:</h2>
        <hr>
            <form action="Profesor" method="post">
                {{ csrf_field() }}
                <?php
                foreach ($profesores as $profesor) {
                    ?>
                    <label>Nombre:</label>
                    <input type="text" value="<?php echo $profesor->nombre ?>" name="nombre" readonly>
                    <label>Apellido:</label>
                    <input type="text" value="<?php echo $profesor->apellido ?>" name="apellido" readonly>
                    <label>Edad:</label>
                    <input type="text" value="<?php echo $profesor->edad ?>" name="edad" readonly>
                    <input type="submit" value="X" name="Eliminar">
                    <input type="submit" value="E" name="Editar"><br>
                    <?php
                }
                ?>
            </form><br>
        <hr>

        <h2>Conserjes:</h2>
        <hr>
            <form action="Conserje" method="post">
                {{ csrf_field() }}
                <?php
                foreach ($conserjes as $conserje) {
                    ?>
                    <label>Nombre:</label>
                    <input type="text" value="<?php echo $conserje->nombre ?>" name="nombre" readonly>
                    <label>Apellido:</label>
                    <input type="text" value="<?php echo $conserje->apellido ?>" name="apellido" readonly>
                    <label>Edad:</label>
                    <input type="text" value="<?php echo $conserje->edad ?>" name="edad" readonly>
                    <input type="submit" value="X" name="Eliminar">
                    <input type="submit" value="E" name="Editar"><br>
                    <?php
                }
                ?>
            </form><br>
        <hr>
        <form action="gestionPersonas" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Añadir Persona" name="addPersona">
            <input type="submit" value="Volver" name="Volver">
        </form><br>
    </center>

</body>

</html>
