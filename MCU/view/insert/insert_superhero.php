<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href="./../../data/imgs/m.png"/>
    <title>Marvel Cinematic Universe - Inserisci supereroe</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
require_once('../../model/movie.php');

function displayMovies()
{
    $movies = movie::getAllMovies();

    for ($i = 0; $i < sizeof($movies); $i++) {
        echo '<option value=' . $movies[$i]->id_movie . '>' . $movies[$i]->title . '</option>';
    }
}

?>

<body>
    <div class="bg">
        <div class="loader">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="loaded">
            <form class="form" method="GET" action="../../api/insert/insert_superhero.php">
                <a href="../../../MCU/index.php" class="back-home"><img src="./../../data/imgs/arrow.png" alt="">
                    <span>HOME</span>
                </a>
                <h2 class="mb-4">Inserisci supereroe</h2>
                <div class="mb-3">
                    <label for="title" class="form-label">Nome</label>
                    <input required type="text" class="form-control" id="name" name='name'>
                </div>
                <div class="mb-3">
                    <label for="director" class="form-label">Poteri</label>
                    <input required type="text" placeholder="Vola, ingrandimento, forza ecc." class="form-control" id="powers" name="powers">
                </div>
                <div class="mb-3">
                    <label for="running_time" class="form-label">Forza</label>
                    <input required type="number" placeholder="9" class="form-control" id="power_ranking" name="power_ranking">
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name='id_movie'>
                    <option selected>Compare in...</option>
                    </option>
                    <?php displayMovies(); ?>
                </select>
                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./../../scripts/load.js"></script>
</body>

</html>