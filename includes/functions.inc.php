<?php

function empyInputSignup($fname,$lname,$email,$pwd,$pwdRepeat){
    $result = null;
    if(empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function empyEmail($email){
    $result = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMismatch($pwd,$pwdRepeat){
    $result = null;
    if($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExists($conn,$email){
    $sql = "SELECT * FROM clients WHERE clientEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createClient($conn,$fname,$lname,$email,$pwd){
    $sql = "INSERT INTO clients (clientFname,clientLname,clientEmail,clientPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$fname,$lname,$email,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

function empyInputLogin($email,$pwd){
    $result = null;
    if(empty($email) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$email,$pwd){
    $emailExists = emailExists($conn,$email);

    if($emailExists === false){
        header("location: ../signup.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["clientPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }elseif ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $emailExists["clientID"];
        $_SESSION["username"] = $emailExists["clientFname"];
        $_SESSION["useremail"] = $emailExists["clientEmail"];
        header("location: ../index.php");
        exit();
    }
}