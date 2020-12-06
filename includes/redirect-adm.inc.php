<?php

if (isset($_POST['products-adm'])){
    header("location: ../admin-panel.php");
}
if (isset($_POST['cat-class-adm'])){
    header("location: ../cat-class-adm.php");
}
if (isset($_POST['types-adm'])){
    header("location: ../types-adm.php");
}
if (isset($_POST['clients-adm'])){
    header("location: ../clients-adm.php");
}
if (isset($_POST['employees-adm'])){
    header("location: ../employees-adm.php");
}