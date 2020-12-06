<?php
function uidExists($conn,$eUID){
    $sql = "SELECT * FROM employees WHERE employeeUID=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../admin-login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$eUID);
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

function empyInputLogin($eUID,$epwd){
    $result = null;
    if(empty($eUID) || empty($epwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginAdmin($conn,$eUID,$epwd){
    $uidExists = uidExists($conn,$eUID);

    if($uidExists === false){
        header("location: ../admin-login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["employeePwd"];
    $checkPwd = password_verify($epwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ../admin-login.php?error=wronglogin");
        exit();
    }elseif ($checkPwd === true){
        session_start();
        $_SESSION["employeeID"] = $uidExists["employeeID"];
        $_SESSION["employeeUID"] = $uidExists["employeeUID"];
        header("location: ../admin-panel.php");
        exit();
    }
}