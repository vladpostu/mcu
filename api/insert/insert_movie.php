
<?php 
    session_start();
    require_once('../../model/movie.php');

    $title = $_GET['title'];
    $director = $_GET['director'];
    $running_time = $_GET['running_time'];
    $release_date = $_GET['release_date'];

    $movie = new Movie($title, $director, $running_time, $release_date);
    $movie->insert(); 

    $_SESSION['alert_status'] = "alert-success";
    $_SESSION['alert_message'] = "Film inserito correttamente";

    header('Location: ./../../index.php')
?>