

<?php 
    session_start();
    require_once('./../../model/movie.php');

    $id = $_GET['id_movie'];

    echo movie::delete_from_id($id);

    $_SESSION['alert_status'] = 'alert-success';
    $_SESSION['alert_message'] = 'Film eliminato con sucesso!';
    
    header('Location: ./../../index.php');
?>