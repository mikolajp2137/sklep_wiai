<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/yerba-icon.ico" />
    <title>Yerbata - Yerba i Herbata</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <script src="https://kit.fontawesome.com/fce5949eb7.js" crossorigin="anonymous"></script>
</head>
<body>
<header id="navbar">
    <div class="container container-nav">
        <div class="site-title">
            <h1>Yerbata</h1>
            <p class="subtitle">Yerba i Herbata</p>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">strona główna</a></li>
                <li><a href="all-entries.html">wszystkie wpisy</a></li>

                <?php
                if (isset($_SESSION["userid"])){
                    echo "<li><a href=\"includes/logout.inc.php\">wyloguj się</a></li>";
                    echo "<li><a href=\"profile.php\">profil</a></li>";
                }else{
                    echo "<li><a href=\"signup.php\">zarejestruj się</a></li>";
                    echo "<li><a href=\"login.php\">zaloguj się</a></li>";
                }
                ?>

            </ul>
        </nav>
    </div>
</header>

<div class="container">


<?php
