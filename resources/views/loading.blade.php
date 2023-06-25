<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <title>Loading</title>
</head>

<body>
    <div class="loading-container">
        <div class="ui active dimmer">
            <div class="ui text loader">Cargando...</div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            // document.body.style.overflow = 'auto'; // Permitir el desplazamiento de la página
            document.querySelector('.loading-container').style.display = 'none';
        }, 300); // Tiempo de espera en milisegundos (en este ejemplo, 3 segundos)
    </script>
</body>

</html>
