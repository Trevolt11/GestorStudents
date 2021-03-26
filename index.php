<?php
include 'helpers/utilities.php';
include 'peliculas/serviceSession.php';
include 'layout/layout.php';

$peliculas = GetList();




?>

<?php echo printHeader(true); ?>

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-pelicula-modal">
            Nueva pelicula
        </button>

    </div>
</div>

<div class="row">

    <?php if (count($peliculas) == 0) : ?>

        <h2>No hay peliculas registrados</h2>

    <?php else : ?>

        <?php foreach ($peliculas as $key => $peli) : ?>

            <div class="col-md-3">

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><?= $peli['name'] ?></h5>

                        <img src="<?= $peli['imgg']?>" class="rounded" alt="150" width="270">
                        <p class="card-text"><?= $peli['description'] ?></p>
                        <p class="card-text"><?php echo $companies[$peli["geneId"]] ?></p>
                    </div>

                    <div class="card-body">
                        <a href="peliculas/edit.php?id=<?= $peli['id']?>" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>



    <?php endif; ?>



</div>

<div class="modal fade" id="nuevo-pelicula-modal" tabindex="-1" aria-labelledby="nuevopeliculaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevopeliculaLabel">Nuevo pelicula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="peliculas/add.php" method="POST">

                    <div class="mb-3">
                        <label for="img" class="form-label">img</label>
                        <input name="imgId" type="text" class="form-control" id="img">
                    </div>

                    <div class="mb-3">
                        <label for="peli-name" class="form-label">Nombre del pelicula</label>
                        <input name="PeliName" type="text" class="form-control" id="peli-name">
                    </div>

                    <div class="mb-3">
                        <label for="peli-description" class="form-label">Descripcion</label>
                        <input name="PeliDescription" type="text" class="form-control" id="peli-description">
                    </div>
                    <div class="mb-3">
                        <label for="peli-genero" class="form-label">Compañia</label>
                        <select name="GeneroId" class="form-select" id="peli-genero">
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($companies as $value => $text) : ?>

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

<?php echo printFooter(true); ?>
