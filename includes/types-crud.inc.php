<?php
require_once 'db.inc.php';
$typeID = 0;
$typeName = '';


if (isset($_POST['clear-input'])){
    header("location: ../types-adm.php");
}

if (isset($_POST['add-type'])){
    $typeName = $_POST['type-name'];

    $sql = "INSERT INTO types (typeName) VALUES ('$typeName');";
    $results = mysqli_query($conn,$sql);
    header("location: ../types-adm.php");
}

if (isset($_GET['edit'])){
    $typeID = $_GET['edit'];
    $sql = "SELECT * FROM types WHERE typeID=$typeID;";
    $results = mysqli_query($conn,$sql);

    if(mysqli_num_rows($results)>0){
        $row = mysqli_fetch_array($results);

        $typeName = $row['typeName'];
    }
}

if (isset($_POST['edit-type'])){
    $typeID = $_POST['typeID'];
    $typeName = $_POST['type-name'];

    $sql = "UPDATE types SET typeName='$typeName' WHERE  typeID=$typeID";
    mysqli_query($conn,$sql);
    header("location: ../types-adm.php");
}