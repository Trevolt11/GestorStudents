<?php
include '../layout/layout.php';
include '../helpers/utilities.php';
include 'serviceSession.php';

$peli = null;
if (isset($_GET["id"])) {

    $peli = GetById($_GET["id"]);

    if(isset($_POST["imgId"]) && isset($_POST["PeliName"]) && isset($_POST["PeliDescription"]) && isset($_POST["GeneroId"])){
        $peli = ["id"=> $_GET["id"], "imgg" => $_POST["imgId"],"name" => $_POST["PeliName"],"description"=>$_POST["PeliDescription"],"geneId"=>$_POST["GeneroId"]];
       
        Edit($peli);

        header("Location: ../index.php");
    }
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

    <?php echo printHeader() ?>

    <?php if ($peli == null && count($peli) == 0) : ?>
    <h2>No existe este pelicula</h2>
    <?php else : ?>

    <form action="edit.php?id=<?= $peli["id"]?>" method="POST">



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

                <?php if($value == $peli["companyId"]):?>
                <option selected value="<?php echo $value; ?>"> <?= $text ?> </option>
                <?php else :?>
                <option value="<?php echo $value; ?>"> <?= $text ?> </option>
                <?php endif;?>



                <?php endforeach; ?>
            </select>
        </div>
        <a href="../index.php" class="btn btn-warning">Volver atras </a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <?php endif; ?>




    <?php echo printFooter() ?>

</body>

</html>