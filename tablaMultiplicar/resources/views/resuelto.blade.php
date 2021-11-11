<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resuelto</title>
</head>

<body>
    <?php
    $num = session()->get('numero');
    ?>
    <h1>Soluciones:</h1>
    <form action="comprobar" method="post">
        {{ csrf_field() }}

        <?php
        for($i=0;$i<11;$i++){
            ?>
        <?php echo $num . ' x '.$i.'='; ?><input type="number" value="<?php echo $solucion[$i]; ?>" style=background-color:greenyellow><br>
        <?php
        }
        ?>
    </form><br>

    <form action="Volver" method="get">
        {{ csrf_field() }}
        <input type="submit" value="Volver" name="Volver">
    </form><br>

</body>

</html>
