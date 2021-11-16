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
        <h1>GESTOR DE USUARIOS:</h1>
        <h2>Alumnos:</h2>
        <hr>
        <form action="delAlumno" method="post">
            {{ csrf_field() }}
            <?php
            foreach ($alumnos as $alumno) {
                ?>
                <label>Nombre:</label>
                <input type="text" value="<?php echo $alumno->nombre ?>" name="nombre" readonly>
                <label>Apellido:</label>
                <input type="text" value="<?php echo $alumno->apellido ?>" name="apellido" readonly>
                <label>Edad:</label>
                <input type="text" value="<?php echo $alumno->edad ?>" name="edad" readonly><br>
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
                    <input type="text" value="<?php echo $profesor->edad ?>" name="edad" readonly><br>
                    <?php
                }
                ?>
            </form><br>
        <hr>

        <h2>Conserjes:</h2>
        <hr>
            <form action="delProfesor" method="post">
                {{ csrf_field() }}
                <?php
                foreach ($conserjes as $conserje) {
                    ?>
                    <label>Nombre:</label>
                    <input type="text" value="<?php echo $conserje->nombre ?>" name="nombre" readonly>
                    <label>Apellido:</label>
                    <input type="text" value="<?php echo $conserje->apellido ?>" name="apellido" readonly>
                    <label>Edad:</label>
                    <input type="text" value="<?php echo $conserje->edad ?>" name="edad" readonly><br>
                    <?php
                }
                ?>
            </form><br>
        <hr>
        <form action="gestion" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Gestionar Personas" name="GestionarPersonas">
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
