

<?php 
    session_start();
    require_once('./../../model/superhero.php');

    $id = $_GET['id_superhero'];

    echo superhero::delete_from_id($id);

    $_SESSION['alert_status'] = 'alert-success';
    $_SESSION['alert_message'] = 'Supereroe eliminato con sucesso!';
    
    header('Location: ./../../index.php');
?>