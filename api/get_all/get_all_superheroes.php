<?php 

    require('../../model/superhero.php');

    $e = superhero::getAllSuperheroes();

    echo json_encode($e);
?>