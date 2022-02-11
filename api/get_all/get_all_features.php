<?php 
    require('../..//model/feature.php');
    require('../../model/movie.php');
    require('../../model/superhero.php');

    $features = feature::getNames();

    echo json_encode($features);
?>