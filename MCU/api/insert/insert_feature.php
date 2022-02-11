
<?php 
    session_start();
    require_once('./../../model/feature.php');

    $id_movie = $_GET['id_movie'];
    $id_superhero = $_GET['id_superhero'];

    $feature = new Feature($id_movie, $id_superhero);
    $feature->insert();

    $_SESSION['alert_status'] = "alert-success";
    $_SESSION['alert_message'] = "Collegamento inserito con successo";

    header('Location: ./../../index.php');
?>