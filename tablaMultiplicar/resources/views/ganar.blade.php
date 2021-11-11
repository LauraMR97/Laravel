<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ganar</title>
</head>
<body>
     <h1>FELICIDADES, HAS GANADO</h1>

     <form action="Volver" method="get">
        {{ csrf_field() }}
        <input type="submit" value="Volver" name="Volver">
    </form><br>
</body>
</html>
