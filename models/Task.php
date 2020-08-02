<?php 

class Task{
    private $id;
    private $nombre;
    private $descripcion;
    private $creacion_date;

    private $db;

    public function __construct(){
        $this->db = Database::conection();
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getCreacion_date(){
        return $this->creacion_date;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        return $this;
    }
    public function setCreacion_date($creacion_date){
        $this->creacion_date = $creacion_date;
        return $this;
    }


    public function getAll(){
        $sql = "SELECT * FROM tasks ORDER BY id ASC";
        $query = $this->db->query($sql);
        $result = [];
        while( $task = mysqli_fetch_assoc($query) ){
            array_push($result, $task);
        }
        return $result;
    }

    public function getTask(){
        $sql = "SELECT * FROM tasks WHERE id = {$this->id};";
        $query = $this->db->query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function newTask(){
        $sql = "INSERT INTO tasks VALUES(NULL, '{$this->nombre}', '{$this->descripcion}', CURDATE())";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updateTask(){
        $sql = "UPDATE tasks SET nombre = '{$this->nombre}', descripcion = '{$this->descripcion}' WHERE id = {$this->id};";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delTask(){
        $sql = "DELETE FROM tasks WHERE id = {$this->id};";
        $query = $this->db->query($sql);
        return $query;
    }
}

?>