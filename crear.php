<?php
include('class/agenda.php');

$id = $_POST['id'] ?? null;
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$hDesde = $_POST['hDesde'];
$hHasta = $_POST['hHasta'];
$estado = 1;
$descripcion = $_POST['descripcion'];
$actividades = $_POST['actividades'];
$ubicacion = $_POST['ubicacion'];

$ins = new agenda();

if ($id == null) {
    $ins->insert(
        $titulo,
        $fecha,
        $hDesde,
        $hHasta,
        $estado,
        $descripcion,
        $actividades,
        $ubicacion
    );
    header("Location: index.php");
} else {
    //por si alguien esta aqui solo falta realizar el editar
}