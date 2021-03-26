<?php
include '../helpers/utilities.php';
include 'serviceSession.php';

    if(isset($_POST["imgId"]) && isset($_POST["PeliName"]) && isset($_POST["PeliDescription"]) && isset($_POST["GeneroId"])){

        $peli = ["imgg" => $_POST["imgId"],"name" => $_POST["PeliName"],"description"=>$_POST["PeliDescription"],"geneId"=>$_POST["GeneroId"]];

        Add($peli);

        header("Location: ../index.php");
    }

?>