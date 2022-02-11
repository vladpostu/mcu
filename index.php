<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Cinematic Universe</title>
    <link rel='icon' href="./data/imgs/m.png" />
    <link rel='stylesheet' href="./styles/style.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    
    <div class="loaded">
        <?php
        require_once('./control/alert.php');

        if (isset($_SESSION['alert_status'])) {
            if (isset($_SESSION['alert_message'])) {
                alert($_SESSION['alert_status'], $_SESSION['alert_message']);
            }
        }
        ?>
        <header id='main_header'>
            <video autoplay muted loop id="video_background">
                <source src='./data/videos/video.mp4' type="video/mp4">
            </video>
            <header class='header-navbar'>
                <nav class="navbar">
                    <img src='./data/imgs/clipart2095178.png' class="nav-title" />
                    <?php handleLogin(); ?>
                </nav>
            </header>
            <img src="./data/imgs/Marvel-logo.png" alt="marvel logo png" id="logo">
        </header>

        <section class="text-center" id="incipit">
            <h3 class="">Benvenuto nell'universo Marvel</h3>
            <h1>SCOPRI TUTTI I FILM E SUPEREROI</h1>

            <p class="mt-4">Registrati o loggati per contribuire anche tu al catalogo!</p>
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle <?php if ($_SESSION['isLogged']) {
                                                                    echo '';
                                                                } else {
                                                                    echo 'disabled';
                                                                } ?>" 
                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Inserisci contenuto
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="./view/insert/insert_film.html">Film</a></li>
                    <li><a class="dropdown-item" href="./view/insert/insert_superhero.php">Supereroe</a></li>
                    <li><a class="dropdown-item" href="./view/insert/insert_feature.php">Comparsa</a></li>
                </ul>
            </div>
        </section>

        <!-- Data display section -->
        <img src="./data/imgs/wave_brown.svg" class="mt-4" alt="">
        <section id="data">
            <div class="resized pb-5">
                <h2 class="">Catalogo</h2>
                <div class="dropdown mt-3">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Scegli cosa consultare
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li style="cursor: pointer;">
                            <div class="dropdown-item ajax-button" onclick="loadSuperheroes()">Supereroi</div>
                        </li>
                        <li style="cursor: pointer;">
                            <div class="dropdown-item ajax-button" onclick="loadMovies()">Film</div>
                        </li>
                        <li style="cursor: pointer;">
                            <div class="dropdown-item ajax-button" onclick="loadFeatures()">Comparse</div>
                        </li>
                    </ul>
                    <div class="input-group mt-3" style="width: 300px;">
                        <input type="text" id="searchbar" class="form-control" placeholder="Cerca qualcosa" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <table class="table table-dark table-striped table-hover mt-2" id="data_table">

                </table>
            </div>
        </section>
        <div id="footer" style="color: gray;">
            <div class="p-4">
                <div style="font-style: italic;">Fatto da <strong>Vlad Postu</strong></div>
                <div>GitLab <strong><a target="blank" href="https://gitlab.com/vladpostu_/informatica-21-22/-/tree/main/MCU">repo</a></strong></div>
            </div>
        </div>
    </div>


    <!-- PHP FUNCTIONS -->
    <?php

    // Hanlde login function  
    function handleLogin()
    {
        if (isset($_SESSION['isLogged'])) {
            if ($_SESSION['isLogged']) {
                echo "Bentornato " . $_SESSION['username'] . "<form action='./control/disconnect.php' method='POST'><button class='btn btn-danger' type='submit'>Disconettiti</button></form>";
            } else {
                echo '
                        <div class="nav-buttons">
                            <a href="./view/login.html" id="login">Login</a>
                            <a href="./view/registration.html" id="registration" class="btn btn-danger">Registrazione</a>
                        </div>
                    ';
            }
        } else {
            $_SESSION['isLogged'] = false;
            echo `
                    <div class="nav-buttons">
                        <a href="./view/login.html" id="login">Login</a>
                        <a href="./view/registration.html" id="registration" class="btn btn-danger">Registrazione</a>
                    </div>
                `;
        }
    }


    //Handle close buttons
    function handleCloseButton()
    {
        if ($_SESSION['isLogged']) {
            echo '
                <i class="fas fa-times"></i>
            ';
        }
    }

    ?>

    <!-- JAVASCRIPT AJAX SCRIPTS -->

    <!-- Ajax function loadMovie that load a movie from ID as parameter-->
    <script>
        function loadMovie($id) {
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("test").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "./api/get_movie.php?id=" + $id);
            xhttp.send();
        }
    </script>

    <!-- Ajax function loadSuperhero that load a superhero from ID as parameter-->
    <script>
        function loadSuperhero($id) {
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("test").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "./api/get_superhero.php?id=" + $id);
            xhttp.send();
        }
    </script>

    <!-- Ajax function that load all movies -->
    <script>
        function loadMovies() {
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table = document.querySelector("#data_table");
                    let response = JSON.parse(this.responseText);

                    table.innerHTML = `
                    <tr class='table-dark table-active'>
                        <thead>
                            <td class='table-dark'>
                                
                            </td>
                            <td class='table-dark'>
                                ID
                            </td>
                            <td class='table-dark'>
                                Titolo
                            </td>
                            <td class='table-dark'>
                                Regista
                            </td>
                            <td class='table-dark'>
                                Tempo durata (min)
                            </td>
                            <td class='table-dark'>
                                Data di rilascio
                            </td>
                        </thead>
                    </tr>
                    `;

                    for (let item in response) {
                        table.innerHTML += `
                            <tbody> 
                                <tr class='table-dark row-table'>
                                    <td style='width: 50px; cursor: pointer'>
                                        <form action='./api/delete/delete_superhero.php' method='GET'> 
                                            <button name='id_superehero' value='${response[item].id_movie}' type='submit' class='ps-3' style='color: grey; background: none; border: none;'>
                                                <?php handleCloseButton(); ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].id_movie}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].title}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].director}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].running_time}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].release_date}
                                    </td>
                                </tr>
                            </tbody>
                        `;
                    }
                }
            };

            xhttp.open("GET", "./api/get_all/get_all_movies.php");
            xhttp.send();
        }
    </script>

    <!-- Ajax function that loads all the superheroes -->
    <script>
        function loadSuperheroes() {
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table = document.querySelector("#data_table");
                    let response = JSON.parse(this.responseText);

                    table.innerHTML = `
                    <tr class='table-dark table-active'>
                        <thead>
                            <td class='table-dark'>
                                
                            </td>
                            <td class='table-dark'>
                                ID
                            </td>
                            <td class='table-dark'>
                                Nome
                            </td>
                            <td class='table-dark'>
                                Poteri
                            </td>
                            <td class='table-dark'>
                                Forza (1-10)
                            </td>
                        </thead>
                    </tr>
                    `;

                    for (let item in response) {
                        table.innerHTML += `
                            <tbody> 
                                <tr class='table-dark row-table'>
                                    <td style='width: 50px; cursor: pointer'>
                                        <form action='./api/delete/delete_superhero.php' method='GET'> 
                                            <button name='id_superehero' value='${response[item].id_superhero}' type='submit' class='ps-3' style='color: grey; background: none; border: none;'>
                                                <?php handleCloseButton(); ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].id_superhero}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].name}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].powers}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].power_ranking}
                                    </td>
                                </tr>
                            </tbody>
                        `;
                    }
                }
            };

            xhttp.open("GET", "./api/get_all/get_all_superheroes.php");
            xhttp.send();
        }
    </script>

    <!-- Ajax function that load all features -->
    <script>
        function loadFeatures() {
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table = document.querySelector("#data_table");
                    let response = JSON.parse(this.responseText);

                    table.innerHTML = `
                    <tr class='table-dark table-active'>
                        <thead>
                            <td class='table-dark'>
                                
                            </td>
                            <td class='table-dark'>
                                ID
                            </td>
                            <td class='table-dark'>
                                Titolo film
                            </td>
                            <td class='table-dark'>
                                Nome supereroe
                            </td>
                        </thead>
                    </tr>
                    `;

                    for (let item in response) {
                        table.innerHTML += `
                            <tbody> 
                                <tr class='table-dark row-table'>
                                    <td style='width: 50px; cursor: pointer'>
                                        <form action='./api/delete/delete_feature.php' method='GET'> 
                                            <button name='id_feature' value='${response[item].id_feature}' type='submit' class='ps-3' style='color: grey; background: none; border: none;'>
                                                <?php handleCloseButton(); ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].id_feature}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].id_movie}
                                    </td>
                                    <td class='table-dark'>
                                        ${response[item].id_superhero}
                                    </td>
                                </tr>
                            </tbody>
                        `;
                    }
                }
            };

            xhttp.open("GET", "./api/get_all/get_all_features.php");
            xhttp.send();
        }
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./scripts/load.js"></script>
    <script src="./scripts/js.js"></script>
</body>

</html>