

<?php 
    session_start();
    require_once('./../../model/feature.php');

    $id = $_GET['id_feature'];

    echo feature::delete_from_id($id);

    $_SESSION['alert_status'] = 'alert-success';
    $_SESSION['alert_message'] = 'Comparsa eliminata con sucesso!';
    
    header('Location: ./../../../index.php');
?>