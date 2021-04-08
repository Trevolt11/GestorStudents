<?php
require_once 'hero.php';
require_once '../layout/layout.php';
require_once '../helpers/utilities.php';
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/SerializationFileHandler.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once 'serviceSession.php';
require_once 'ServiceCookies.php';
require_once 'ServiceFile.php';

$layout = new Layout();
$service = new ServiceFile();
$utilities = new Utilities();

$hero = null;

if (isset($_GET["id"])) {

    $hero = $service->GetById($_GET["id"]);
}

if (isset($_POST["heroId"]) && isset($_POST["imgId"]) && isset($_POST["HeroName"]) && isset($_POST["HeroApellido"]) && isset($_POST["HeroDescription"]) && isset($_POST["CompanyId"])) {

    $status = ($_POST["Status"] == "activo") ? true : false;

    $hero = new Hero($_POST["heroId"],$_POST["imgId"], $_POST["HeroName"], $_POST["HeroApellido"],$_POST["HeroDescription"],$_POST["CompanyId"], $status);

    $service->Edit($hero);

    header("Location: ../index.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php echo $layout->printHeader() ?>

    <?php if ($hero == null) : ?>
        <h2>No existe este estudiante</h2>
    <?php else : ?>

        <form action="edit.php" method="POST">

            <input type="hidden" name="heroId" value="<?= $hero->Id ?>">

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

                        <?php if ($value == $hero->CompanyId) : ?>
                            <option selected value="<?php echo $value; ?>"> <?= $text ?> </option>
                        <?php else : ?>
                            <option value="<?php echo $value; ?>"> <?= $text ?> </option>
                        <?php endif; ?>



                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-check">
                
                <?php if($hero->Status): ?>

                    <input class="form-check-input" type="checkbox" name="Status" value="activo" id="flexCheckChecked" checked>

                <?php else: ?>

                    <input class="form-check-input" type="checkbox" name="Status" value="activo" id="flexCheckChecked">

                <?php endif;?>

                
                <label class="form-check-label" for="flexCheckChecked">
                    Activo
                </label>
            </div>

            <a href="../index.php" class="btn btn-warning">Volver atras </a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    <?php endif; ?>




    <?php echo $layout->printFooter() ?>

</body>

</html>