<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivinar</title>
</head>

<body>
    <h1>Juego de Adivinar</h1>
    <?php

if(isset ($mensaje)){
    echo $mensaje;
    echo '<br>Tienes: '.$intentos.' intentos';
}
    ?>
    <form action="adivinar" method="post">
        {{ csrf_field() }}
        <input type="number" name="numero" id="">
        <input type="submit" value="Aceptar">
    </form>
</body>

</html>
