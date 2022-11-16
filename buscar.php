<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscar por fecha</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container bg-light vh-100">
        <h1 class="text-center m-3">Reporte por Actividad</h1>

        <div class="menu">
            <a href="formulario.php">
                <p class="botn">Crear Actividad</p>
            </a>
            <a href="reportes.php">
                <p class="botn">Volver</p>
            </a>
            <a href="index.php">
                <p class="botn">Home</p>
            </a>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php
            $ID = $_POST['ID'];
            require_once("class/agenda.php");
            $obj_actividad = new agenda();
            //echo $obj_actividades;
            $actividades = $obj_actividad->reportar($ID);
            //var_dump($actividades);
            //$index = 0;

            //echo "<pre>";
            //print_r($actividades);
            //echo "</pre>";
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>

</body>

</html>