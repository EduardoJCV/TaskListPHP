<?php   
require '../views/components/header.php';
require '../controllers/TaskController.php';
require '../models/Task.php';
require '../config/db.php';
require '../config/parameters.php';

if ( isset($_GET['id']) ) {
    $controller = new TaskController();
    $task = $controller->obtenerTarea($_GET['id']);
}else{
    header('Location:'.BASE_URL);
}

?>

<center class="container m-5 row">
        <div class="">
            <h2>Actualizar Tarea</h2>
            <form action="<?=BASE_URL?>/config/helper.php?action=editar&param=<?=$_GET['id']?>" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input value="<?=$task['nombre']?>" name="nombre" required type="text" class="form-control" id="nombre" placeholder="Nombre de la tarea">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea value="<?=$task['descripcion']?>" name="descripcion" required class="form-control" id="descripcion" rows="3" placeholder="Descripcion de la tarea"><?=$task['descripcion']?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
</center>

<?php  require_once '../views/components/footer.php'; ?>