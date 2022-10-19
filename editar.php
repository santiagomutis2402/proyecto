<?php
$ID = $_GET['ID'];
require_once("class/agenda.php");
$obj_actividad = new agenda();
$actividades = $obj_actividad->select_byid($ID);

//Datos traidos de la db
$titulo = $actividades['titulo'];
$fecha = $actividades['fecha'];
$hora_inicio = $actividades['hora_inicio'];
$hora_final = $actividades['hora_final'];
$id_actividad = $actividades['id_actividad'];
$descripcion = $actividades['descripcion'];
$ubicacion = $actividades['ubicacion'];
$actividad = $actividades['actividad'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-light vh-100">
        <form action="crear.php" method="POST">
            <h1 class="text-center">Formulario</h1>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fs-3">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp" placeholder="Futbol" value="<?php echo $titulo ?>" />
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fs-3">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha ?>" aria-describedby="emailHelp" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin de la primera col-->
                <div class="col-12">
                    <label for="basic-url" class="form-label fs-3">Horario</label>
                    <div class="input-group mb-3">
                        <input type="time" name="hDesde" class="form-control" placeholder="Username" aria-label="Username" id="hDesde" value="<?php echo $hora_inicio ?>" />
                        <span class="input-group-text">-</span>
                        <input type="time" name="hHasta" class="form-control" placeholder="Server" aria-label="Server" id="hHasta" value="<?php echo $hora_final ?>" />
                    </div>
                </div>
                <!--Segunda columna fin horario-->
                <div class="col-12 col-md-6 mb-3">
                    <label for="" class="form-label fs-3">Ubicacion</label>
                    <input type="text" name="ubicacion" class="form-control" id="ubicacion" placeholder="via porras, cerca de sanfrancisco" aria-label="Server" value="<?php echo $ubicacion ?>" />
                </div>
                <!--Tercera columna fin de ubicacion-->

                <div class="col-12 col-md-6 mb-3">
                    <label for="basic-url" class="form-label fs-3">Actividades</label>
                    <input class="form-control" type="text" id="actividades" name="actividades" placeholder="ingrese una actividad" list="actividades_list" value="<?php echo $actividad ?>" />
                    <?php
                    require_once("class/agenda.php");
                    $obj_actividad = new agenda();
                    $actividades = $obj_actividad->select_actividades();

                    $nactividades = count($actividades);

                    //inicio del select de actividades
                    if ($nactividades > 0) : ?>
                        <datalist id="actividades_list">
                            <?php foreach ($actividades as $resultado) : ?>
                                <option value=<?php print $resultado['actividad'] ?>></option>
                            <?php endforeach; ?>
                        </datalist>
                </div>
            <?php endif ?>
            <!--Find del select-->


            <div class="col-12 mb-4">
                <label for="basic-url" class="form-label fs-3">Descripcion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion" id="descripcion" placeholder="Voy a ir a jugar futbol con alguno de mis amigos en versalles"><?php echo $descripcion ?></textarea>
            </div>

            <input type="hidden" name="id" id="id" value="<?php echo $ID ?>">

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Editar</button>
            </div>
            </div>
        </form>
    </div>
</body>

</html>