<?php
include('class/agenda.php');

$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$hDesde = $_POST['hDesde'];
$hHasta = $_POST['hHasta'];
$estado = 1;
$descripcion = $_POST['descripcion'];
$actividades = $_POST['actividades'];
$ubicacion = $_POST['ubicacion'];

$ins = new agenda();

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