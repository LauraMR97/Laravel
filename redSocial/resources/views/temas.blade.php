<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temas</title>
</head>

<body>
    <center>
        <h1>Temas:</h1>
        <?php
        use App\Models\Conjunto;
        $personaLoggeada=session()->get('persona');
        $emailPerLoggeada=$personaLoggeada->correo;
        $ID_ROL = Conjunto::with(['usuarios'])->where('correo', $emailPerLoggeada)->get();
        dd($ID_ROL);

 foreach($temas as $tema){
 ?>
        <form action="temas" method="post">
            {{ csrf_field() }}
            <label>Titulo:</label>
            <input type="text" name="titulo" value="<?php echo $tema->titulo?>" readonly>
            <label>Edad Permitida:</label>
            <input type="text" name="edad_Minima" value="<?php echo $tema->edad_minima.' años'?>" readonly>
            <input type="submit" name="borrar" value="X">
            <input type="submit" name="ver" value="Ver Tema">
        </form><br>
        <?php
 }
?>

        <form action="gestionarTemas" method="post">
            {{ csrf_field() }}
            <input type="submit" name="add" value="Añadir Tema">
            <input type="submit" name="volver" value="volver">
        </form>
    </center>
</body>

</html>
