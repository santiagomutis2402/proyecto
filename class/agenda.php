<?php
require_once('modelo.php');

class agenda extends modeloCredencialesBD
{
    protected $titulo;
    protected $fecha;
    protected $hora_inicio;
    protected $hora_final;
    protected $descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    {
        //se llama validar existencia pero valida si esta la actividad o no y si no esta la inserta 
        //supongamos que funciona no he probado el query
        $instruccion = "CALL ValidarExistencia('me dio peresa poner los campos pero deberia servir')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las noticias";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}