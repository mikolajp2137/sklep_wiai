<?php
session_start();
include_once "includes/db.inc.php";
?>

<html>
<head>
    <title>FFNFshop</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar">
    <a class="navbar-brand" href="#">
        <img src="images/logo.svg" id="logo" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">koszyk</a>
            </li>
            <?php
            if (isset($_SESSION["userid"])){
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"includes/logout.inc.php\">wyloguj się</a></li>";
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"profile.php\">profil</a></li>";
            }else{
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"signup.php\">zarejestruj się</a></li>";
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\">zaloguj się</a></li>";
            }
            ?>
        </ul>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle nav-item" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                klasy okrętów
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">Pancerniki</button>
                <button class="dropdown-item" type="button">Krążowniki</button>
                <button class="dropdown-item" type="button">Niszczyciele</button>
                <button class="dropdown-item" type="button">Lotniskowce</button>
            </div>
        </div>

        <div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="szukaj..." aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" id="search-button" type="submit">szukaj</button>
            </form>
        </div>
    </div>
</nav>

