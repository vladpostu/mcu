<?php 

    require('./model/movie.php');

    $e = movie::getAllMovies();

    echo json_encode($e);
?>