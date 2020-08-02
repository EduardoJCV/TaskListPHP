<?php

class TaskController{

    public function obtenerTodas(){
        $model = new Task();
        $query = $model->getAll();
        return $query;
    }

    public function obtenerTarea($id){
        $model = new Task();
        $model->setId($id);
        $query = $model->getTask();
        return $query;
    }

    public function eliminar($id){
        $model = new Task();
        $model->setId($id);
        $query = $model->delTask();
        header('Location:'.BASE_URL);
        // return $query;
    }

    public function editar(){
        var_dump($_POST);
        var_dump($_GET);
        if ( !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_GET['param']) ) {
            $model = new Task();
            $model->setID( $_GET['param'] );
            $model->setNombre( $_POST['nombre'] );
            $model->setDescripcion( $_POST['descripcion'] );
            $query = $model->updateTask();

            header('Location:'.BASE_URL);
            // return $query;
        }
    }

    public function crear(){
        var_dump($_POST);
        if ( !empty($_POST['nombre']) && !empty($_POST['descripcion']) ) {
            $model = new Task();
            $model->setNombre( $_POST['nombre'] );
            $model->setDescripcion( $_POST['descripcion'] );
            $query = $model->newTask();

            header('Location:'.BASE_URL);
            // return $query;
        }
    }

}