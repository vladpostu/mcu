

<?php
    session_start();
    require_once('../model/db.php');

    $conn = connect();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT password FROM users";
    $result = $conn->query($query);

    while($row = $result->fetch()){
        if(password_verify($password, $row['password'])) {
            $_SESSION['isLogged'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['alert_status'] = 'alert-success';
            $_SESSION['alert_message'] = "Loggato con successo!";
            break;
        }
    }

    if($_SESSION['isLogged'] != true) {
        $_SESSION['alert_status'] = 'alert-danger';
        $_SESSION['alert_message'] = "Errore nel loggarsi, riprovare.";
    }

    header("Location: ../index.php");
?>