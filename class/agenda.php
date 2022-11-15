<?php
require_once('modelo.php');

class agenda extends modeloCredencialesBD
{
    protected $titulo;
    protected $fecha;
    protected $hora_inicio;
    protected $hora_final;
    protected $ubicacion;
    protected $actividades;
    protected $descripcion;
    protected $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(
        $titulo,
        $fecha,
        $hora_inicio,
        $hora_final,
        $estado,
        $descripcion,
        $actividades,
        $ubicacion
    ) {
        $url = "http://localhost/proyecto-master/api/producto/crear.php";
        $ch = curl_init($url);

        $data = array(
            "titulo" => "${titulo}",
            "fecha" => "${fecha}",
            "hora_inicio" => "${hora_inicio}",
            "hora_final" => "${hora_final}",
            "estado" => $estado,
            "descripcion" => "${descripcion}",
            "actividades" => $actividades,
            "ubicacion" => "${ubicacion}"

        );

        $payload = json_encode(array("user" => $data));

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);
    }

    public function listar()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto-master/api/producto/leer.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);
        /////////////////
        if (!$valores) {
            echo "Fallo al consultar las actividades";
        } else {
            return $valores;
        }
        curl_close($ch);
    }

    public function select_actividades()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto-master/api/producto/listar_actividades.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        if (!$valores) {
            echo "Fallo al consultar las actividades";
        } else {
            return $valores;
        }
        curl_close($ch);
    }

    public function select_byid($ID)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/proyecto-master/api/producto/leer_uno.php?id=$ID");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);

        $valores = json_decode($resultado, true);

        if (!$valores) {
            echo "Fallo al consultar las actividades";
        } else {
            return $valores;

            $this->_db->close();
        }
    }

    public function eliminar($ID)
    {
        $url = "http://localhost/proyecto-master/api/producto/eliminar.php";
        $ch = curl_init($url);

        $data = array(
            "ID" => $ID
        );

        $payload = json_encode(array("user" => $data));

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);
    }

    public function update(

        $titulo,
        $fecha,
        $hora_inicio,
        $hora_final,
        $estado,
        $descripcion,
        $actividades,
        $ubicacion,
        $ID
    ) {
        $url = "http://localhost/proyecto-master/api/producto/editar.php";
        $ch = curl_init($url);

        $data = array(
            "titulo" => "${titulo}",
            "fecha" => "${fecha}",
            "hora_inicio" => "${hora_inicio}",
            "hora_final" => "${hora_final}",
            "estado" => $estado,
            "descripcion" => "${descripcion}",
            "actividades" => $actividades,
            "ubicacion" => "${ubicacion}",
            "ID" => $ID
        );

        $payload = json_encode(array("user" => $data));

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);
    }

    public function reportar($ID)
    {

        $instruccion = "CALL registro_por_actividad('" . $ID . "')";
        //echo $instruccion;
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las actividades por dia";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function reportarFecha($desde, $hasta)
    {

        $instruccion = "CALL FiltrarPorFecha('" . $desde . "','" . $hasta . "')";
        //echo $instruccion;
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las actividades por dia";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}