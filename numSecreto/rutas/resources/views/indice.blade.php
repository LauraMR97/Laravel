<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ADIVINA EL NUMERO</h1>
    <form action="calcular" method="post">
    {{csrf_field() }}
        <input type="number" name="numero" id="">
        <input type="submit" value="Aceptar">
    </form>
    Vista creada
    <a href="otra">Ir a otra pagina</a>
</body>
</html>
