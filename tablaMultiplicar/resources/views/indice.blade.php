<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Introduccion</title>
</head>
<body>
    <h1>Juego de Multiplicar:</h1>
    <form action="mostrar" method="post">
        {{csrf_field() }}
            <input type="number" name="numero" placeholder="Inserta un numero" required>
            <input type="submit" value="Aceptar">
        </form>


        <h3>Bienvenido al juego de multiplicar!!!</h3>
        <p>Inserta el numero del cual quieres que se genere un desafio
            trepidante de multiplicacion sin parangon!!
        </p>
</body>
</html>
