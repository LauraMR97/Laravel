<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla</title>
</head>

<body>
    <?php

    //echo '<br>Tienes: ' . $session()->get('intentos') . ' intentos';
    $intentos = session()->get('intentos');
    $num = session()->get('numero');
    echo 'Tienes: ' . $intentos . ' intentos';

    if($intentos==6){
        for($i=0;$i<11;$i++){
            $colores[$i]='style=background-color:white';
            $solucion[$i]='';
        }
    }

    ?>

    <h1>Tabla del: <?php echo $num?></h1>
    <form action="comprobar" method="post">
        {{ csrf_field() }}

        <?php
        for($i=0;$i<11;$i++){
        ?>
            <?php echo $num . ' x '.$i.'= '; ?><input type="number" name="caja[]" placeholder="Inserta un numero" value='<?php echo $solucion[$i]?>'
            <?php echo $colores[$i]; ?>><br>
        <?php
         }
        ?>
        <br>
        <input type="submit" value="Aceptar" name="Aceptar">
        <input type="submit" value="Volver" name="Volver">
        <input type="submit" value="MeRindo" name="MeRindo">
    </form><br>
</body>

</html>
