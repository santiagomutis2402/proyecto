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
            $descripcion . "','" . $actividades . "','" . $ubicacion . "',)";

        $consulta = $this->_db->query($instruccion);
        // $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        // if (!$resultado) {
        //     echo "Fallo al insertar las actividades";
        // } else {
        //     return $resultado;
        //     $this->_db->close();
        // }
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
}