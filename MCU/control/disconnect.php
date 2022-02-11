

<?php 

    session_start();

    $_SESSION['isLogged'] = false;
    $_SESSION['alert_status'] = 'd-none';

    header("Location: ../index.php");

?>