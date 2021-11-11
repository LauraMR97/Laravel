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
    if (!session()->has('alumnos')) {
        $alumnos = new Conjunto('Alumnos');
        session()->put('alumnos', $alumnos);
    } else {
        $alumnos = session()->get('alumnos');
    }

    if (!session()->has('profesores')) {
        $profesores = new Conjunto('Profesores');
        session()->put('profesores', $profesores);
    } else {
        $profesores = session()->get('profesores');
    }

    ?>

    <center>
        <h1>GESTOR DE USUARIOS:</h1>
        <h2>Alumnos:</h2>
        <hr>
        <?php
        foreach($alumnos->getPersonas() as $alumno){
        ?>
        <form action="delAlumno" method="post">
            {{ csrf_field() }}
            <?php
            echo $alumno->__toString();
            ?>
        </form>
        <?php
        }
        ?>

        <h2>Profesores:</h2>
        <hr>
        <?php
        foreach($profesores->getPersonas() as $profesor){
        ?>
        <div id='profesores'>
            <form action="delProfesor" method="post">
                {{ csrf_field() }}
                <?php
                echo $profesor->__toString();
                ?>
            </form>
        </div>
        <?php
        }
        ?><br>
        <hr>
        <form action="aniadir" method="post">
            {{ csrf_field() }}
            <input type="submit" value="ADD Persona" name="Persona">
            <input type="submit" value="Borrar todas las Personas" name="Borrar">
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
