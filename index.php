<?php
require_once 'estudiantes/hero.php';
require_once 'FileHandler/IFileHandler.php';
require_once 'FileHandler/FileHandlerBase.php';
require_once 'FileHandler/SerializationFileHandler.php';
require_once 'FileHandler/JsonFileHandler.php';
require_once 'helpers/utilities.php';
require_once 'estudiantes/serviceSession.php';
require_once 'estudiantes/ServiceCookies.php';
require_once 'estudiantes/ServiceFile.php';
require_once 'layout/layout.php';

$layout = new Layout(true);
$service = new ServiceFile(true);
$utilities = new Utilities();

$estudiantes = $service->GetList();


?>

<?php echo $layout->printHeader(); ?>

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-estudiante-modal">
            Nuevo estudiante
        </button>

    </div>
</div>

<div class="row">

    <?php if (count($estudiantes) == 0) : ?>

    <h2>No hay estudiantes registrados</h2>

    <?php else : ?>

    <?php foreach ($estudiantes as $key => $hero) : ?>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body">

                <img src="<?= $hero->Imgg ?>" class="rounded" alt="150" width="270">

                <h5 class="card-title"><?= $hero->Name ?></h5>
                <h5 class="card-title"><?= $hero->Apellido ?></h5>
                <p class="card-text"><?= $hero->Description ?></p>

                <p class="card-text"><strong><?php echo $utilities->companies[$hero->CompanyId] ?></strong></p>

                <p class="card-text">

                    <strong>

                        <?php if($hero->Status): ?>

                        <span class="text-success">Activo</span>

                        <?php else :?>

                        <span class="text-danger">Inactivo</span>

                        <?php endif;?>

                    </strong>

                </p>

            </div>

            <div class="card-body">
                <a href="estudiantes/edit.php?id=<?= $hero->Id ?>" class="btn btn-primary">Editar</a>
                <a href="#" data-id="<?= $hero->Id ?>" class="btn btn-danger btn-delete">Eliminar</a>
            </div>
        </div>

    </div>

    <?php endforeach; ?>



    <?php endif; ?>



</div>

<div class="modal fade" id="nuevo-estudiante-modal" tabindex="-1" aria-labelledby="nuevoestudianteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoestudianteLabel">Nuevo estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="estudiantes/add.php" method="POST">

                    <div class="mb-3">
                        <label for="img" class="form-label">img</label>
                        <input name="imgId" type="text" class="form-control" id="img">
                    </div>

                    <div class="mb-3">
                        <label for="hero-name" class="form-label">Nombre</label>
                        <input name="HeroName" type="text" class="form-control" id="hero-name">
                    </div>

                    <div class="mb-3">
                        <label for="hero-apellido" class="form-label">Apellido</label>
                        <input name="HeroApellido" type="text" class="form-control" id="hero-Apellido">
                    </div>


                    <div class="mb-3">
                        <label for="hero-description" class="form-label">Materias Favoritas (Divida por comas
                            ','</label>
                        <input name="HeroDescription" type="text" class="form-control" id="hero-description">
                    </div>

                    <div class="mb-3">
                        <label for="hero-company" class="form-label">Carrera</label>
                        <select name="CompanyId" class="form-select" id="hero-company">
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($utilities->companies as $value => $text) : ?>

                            <option value="<?php echo $value; ?>"> <?= $text ?> </option>

                            <?php endforeach; ?>
                        </select>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $layout->printFooter(); ?>

<script src="assets/js/site/index/index.js"></script>