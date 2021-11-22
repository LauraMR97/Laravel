<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tema Abierto</title>
</head>

<body>

    <center>
        <h1><?php echo $tema->titulo; ?></h1>
        <h3>Comentarios:</h3>
        <?php
        if (isset($comentarios)){
        foreach($comentarios as $comentario){
        ?>
        <form action="comentarios" method="post">
            {{ csrf_field() }}
            <label>Comentario de:</label>
            <input type="text" value="<?php echo $comentario->correo; ?>" readonly><br>
            <textarea name="comentario" rows="3" cols="50" readonly><?php echo $comentario->descripcion; ?></textarea><br>
            <input type="submit" value="Contestar" name="respuesta">
        </form><br>
        <?php
        }
    }
        ?>

        <hr>
        <form action="volverDeTema" method="post">
            {{ csrf_field() }}
            <textarea name="comentario" rows="5" cols="50" placeholder="Escriba algo"></textarea><br>
            <input type="submit" name="addComentario" value="Añadir Comentario">
            <input type="submit" name="volver" value="volver">
        </form>
    </center>
</body>

</html>
