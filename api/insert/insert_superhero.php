
<?php 
    session_start();
    require_once('./../../model/superhero.php');
    require_once('./../../model/feature.php');

    $name = $_GET['name'];
    $powers = $_GET['powers'];
    $power_ranking = $_GET['power_ranking'];

    $superhero = new Superhero($name, $powers, $power_ranking);
    $superhero->insert();

    $id_movie = $_GET['id_movie'];
    $id_superhero = $superhero->id_superhero;

    $feature = new Feature($id_movie, $id_superhero);
    $feature->insert();

    $_SESSION['alert-status'] = "alert-success";
    $_SESSION['alert-message'] = "Supereroe inserito con successo";

    header('Location: ./../../index.php');
?>