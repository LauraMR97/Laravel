<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <?php
        if ($coms) {
            foreach ($coms as $c) {
                echo $c['DNI'] . ' ';
                echo $c['Nombre'] . ' '.'<br>';
                //echo $c['Comentario'].' '.'<br>';
                if ($c['Comentario']){
                    foreach($c['Comentario'] as $tex){
                        echo $tex.'<br>';
                    }
                }
                else {
                    echo 'Sin comentarios'.'<br>';
                }
                echo '<br>';
            }
        } else {
            echo 'No se han encontrado datos.';
        }
        ?>
        <a href="volver">Volver</a>
    </body>
</html>
