<?php   
require 'views/components/header.php';
require 'controllers/TaskController.php';
require 'models/Task.php';
require 'config/db.php';
require 'config/parameters.php';

$controller = new TaskController();
$taskList = [];

$taskList = $controller->obtenerTodas();

?>

<main class="container m-5 " style="margin-bottom:200px">
  <div class="row ">
    <div class="col-3 ">
        <h2>Crear Tarea</h2>
        <form action="<?=BASE_URL?>/config/helper.php?action=crear" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input name="nombre" required type="text" class="form-control" id="nombre" placeholder="Nombre de la tarea">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" required class="form-control" id="descripcion" rows="3" placeholder="Descripcion de la tarea"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
    <div class="col-9 ">
        <h2>Lista de tareas</h2>
        <ul class="list-group">
            <?php for ($i=0; $i < count($taskList); $i++) : ?>
                <li class="list-group-item">
                    <div class="row">
                    <div class="col-1">
                        <?=$i+1 ?>
                    </div>
                    <div class="col-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?=$taskList[$i]['id']?>" aria-expanded="false" aria-controls="collapse<?=$taskList[$i]['id']?>">
                                            <?=$taskList[$i]['nombre'] ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse<?=$taskList[$i]['id']?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?=$taskList[$i]['descripcion'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="<?=BASE_URL?>/views/edit.php?id=<?=$taskList[$i]['id']?>" class="btn btn-warning">Editar</a>
                    </div>
                    <div class="col-2">
                        <a href="<?=BASE_URL?>/config/helper.php?action=eliminar&param=<?=$taskList[$i]['id']?>" class="btn btn-danger">Eliminar</a>
                    </div>
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
  </div>
</main>

<?php  require_once 'views/components/footer.php'; ?>
