<?php

if(isset($_POST["submit"])){

    $eUID = $_POST["eUID"];
    $epwd = $_POST["epwd"];

    require_once 'db.inc.php';
    require_once 'functions-admin.inc.php';

    if(empyInputLogin($eUID,$epwd) !== false){
        header("location: ../admin-login.php?error=emptyinput");
        exit();
    }

    loginAdmin($conn,$eUID,$epwd);

}else{
    header("location: ../admin-login.php");
    exit();
}