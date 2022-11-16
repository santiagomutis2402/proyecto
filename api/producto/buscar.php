<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// incluir archivos de conexion y objetos
include_once '../config/conexion.php';
include_once '../objectos/agenda.php';
// obtener conexion a la base de datos
$conex = new Conexion();
$db = $conex->obtenerConexion();
// preparar el objeto producto
$product = new agenda($db);
// set ID property of record to read
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
// leer los detalles del producto a editar
$product->report_activity($_GET['id']);
//var_dump($product);
