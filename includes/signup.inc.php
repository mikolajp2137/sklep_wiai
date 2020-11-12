<?php

if(isset($_POST["submit"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(empyInputSignup($fname,$lname,$email,$pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(empyEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMismatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=pwdmismatch");
        exit();
    }
    if(emailExists($conn,$email) !== false){
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    createClient($conn,$fname,$lname,$email,$pwd);

} else {
    header("location: ../signup.php");
    exit();
}