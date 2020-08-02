<?php
require '../controllers/TaskController.php';
require '../models/Task.php';
require '../config/db.php';
require '../config/parameters.php';

if ( isset($_GET['action']) ) {
    echo ' action';
    switch ($_GET['action']) {
        case 'crear':
            echo ' crear';
            if ( isset($_POST) ) {
                $controller = new TaskController();
                $controller->crear();
            }
        break;
        case 'eliminar':
            echo ' eliminar';
            if ( isset($_GET['param']) ) {
                $controller = new TaskController();
                $controller->eliminar($_GET['param']);
            }
        break;
        case 'editar':
            echo ' editar';
            if ( isset($_POST) && isset($_GET['param']) ) {
                $controller = new TaskController();
                $controller->editar();
            }
        break;
        default:

        break;
    }
}else{
    
}