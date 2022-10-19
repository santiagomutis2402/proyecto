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
        $hDesde,
        $hHasta,
        $estado,
        $descripcion,
        $actividades,
        $ubicacion
    ) {
        $instruccion = "call agenda.ValidarExistencia('" . $titulo . "','" . $fecha .
            "','" . $hDesde . "','" . $hHasta . "','" . $estado . "','" .
            $descripcion . "','" . $actividades . "','" . $ubicacion . "')";

        $consulta = $this->_db->query($instruccion);
        // $resultado = $consulta->fetch_all();

        // if (!$resultado) {
        //     echo "Fallo al insertar las actividades";
        // } else {
        //     return $resultado;
        //     $this->_db->close();
        // }

        return $instruccion;
    }

    public function listar()
    {

        $instruccion = "CALL listar()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las actividades";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function select_actividades()
    {

        $instruccion = "CALL select_actividades()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las actividades";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function select_byid($ID)
    {
        $instruccion = "CALL agenda.select_byid($ID)";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_assoc();

        if (!$resultado) {
            echo "Fallo al consultar las actividades";
        } else {
            return $resultado;

            $this->_db->close();
        }
    }

    public function eliminar($ID)
    {
        $instruccion = "call agenda.eliminar($ID);";
        $consulta = $this->_db->query($instruccion);
        // $resultado = $consulta->fetch_all();

        // if (!$resultado) {
        //     echo "Fallo al eliminar";
        // } else {
        //     return $resultado;

        //     $this->_db->close();
        // }
    }

    public function update(

        $titulo,
        $fecha,
        $hDesde,
        $hHasta,
        $estado,
        $descripcion,
        $actividades,
        $ubicacion,
        $ID
    ) {
        $instruccion = "call UpdateAgenda('" . $titulo . "','" . $fecha .
            "','" . $hDesde . "','" . $hHasta . "','" . $estado . "','" .
            $descripcion . "','" . $actividades . "','" . $ubicacion . "','" . $ID . "')";
        $consulta = $this->_db->query($instruccion);
        // $resultado = $consulta->fetch_assoc();
        // if (!$resultado) {
        //     echo "Fallo al actualizar las actividades";
        // } else {
        //     return $resultado;

        //     $this->_db->close();
        // }
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
