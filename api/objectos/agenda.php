<?php
class agenda
{
    // conexion de base de datos y tabla productos
    private $conn;
    private $nombre_tabla = "productos";
    // atributos de la clase
    public $id;
    public $titulo;
    public $fecha;
    public $hora_inicio;
    public $hora_final;
    public $estado;
    public $descripcion;
    public $id_actividad;
    public $actividad;
    public $ubicacion;
    // constructor con $db como conexion a base de datos
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // leer productos
    function read()
    {
        // query para seleccionar todos
        $query = "call agenda.listar()";
        // sentencia para preparar query
        $stmt = $this->conn->prepare($query);
        // ejecutar query
        $stmt->execute();
        return $stmt;
    }

    function readactivity()
    {
        // query para seleccionar todos
        $query = "CALL select_actividades()";
        // sentencia para preparar query
        $stmt = $this->conn->prepare($query);
        // ejecutar query
        $stmt->execute();
        return $stmt;
    }


    public function crear(
        $titulo,
        $fecha,
        $hora_inicio,
        $hora_final,
        $estado,
        $descripcion,
        $actividad,
        $ubicacion
    ) {

        // query para insertar un registro
        $query = "ValidarExistencia('" . $titulo . "','" . $fecha .
            "','" . $hora_inicio . "','" . $hora_final . "','" . $estado . "','" .
            $descripcion . "','" . $actividad . "','" . $ubicacion . "')";
        // preparar query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->hora_inicio = htmlspecialchars(strip_tags($this->hora_inicio));
        $this->hora_final = htmlspecialchars(strip_tags($this->hora_final));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->actividad = htmlspecialchars(strip_tags($this->actividad));
        $this->ubicacion = htmlspecialchars(strip_tags($this->ubicacion));
        // bind values
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":hora_inicio", $this->hora_inicio);
        $stmt->bindParam(":hora_final", $this->hora_final);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":actividad", $this->actividad);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // utilizado al completar el formulario de actualización del producto
    function readOne()
    {
        // consulta para leer un solo registro
        $query = "SELECT d.id id, d.titulo, d.fecha, d.hora_inicio, d.hora_final, d.estado, d.descripcion, d.ubicacion, d.id_actividad, a.actividad 
          FROM dias d inner join actividades a on d.id_actividad=a.id 
          where d.id=?";
        // preparar declaración de consulta
        $stmt = $this->conn->prepare($query);
        // ID de enlace del producto a actualizar
        $stmt->bindParam(1, $this->id);
        // ejecutar consulta
        $stmt->execute();
        // obtener fila recuperada
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // establecer valores a las propiedades del objeto
        $this->titulo = $row['titulo'];
        $this->fecha = $row['fecha'];
        $this->hora_inicio = $row['hora_inicio'];
        $this->hora_final = $row['hora_final'];
        $this->estado = $row['estado'];
        $this->descripcion = $row['descripcion'];
        $this->ubicacion = $row['ubicacion'];
        $this->id_actividad = $row['id_actividad'];
        $this->actividad = $row['actividad'];
    }

    function formatear($json)
    {
        echo "<pre>";
        var_dump($json);
        echo "<\pre>";
        exit;
    }
}