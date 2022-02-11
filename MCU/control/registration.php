

<?php 
    session_start();
    require_once('../model/db.php');

    $conn = connect();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

    $query = "";
    $query = "INSERT INTO users(username, password) 
              VALUES('$username', '$password_encrypted')";

    $conn->exec($query);

    $_SESSION['isLogged'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['alert_status'] = "alert-success";
    $_SESSION['alert_message'] = "Registrato con successo!";

    header("Location: ../index.php");
?>