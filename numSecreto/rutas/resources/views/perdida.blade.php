<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perdido</title>
</head>
<body>
<h3>HAS PERDIDO</h3>
<?php
echo 'El numero secreto era: '.$nSecreto;
?>
    <form action="VolverAdivinar" method="get">
        {{ csrf_field() }}
    <input type="submit" name="Volver" value="Volver">
    </form>
</body>
</html>
