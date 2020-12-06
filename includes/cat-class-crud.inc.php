<?php
require_once 'db.inc.php';

$classID = 0;
$className = '';

if (isset($_POST['add-class'])){
    $className = $_POST['class-name'];

    $sql = "INSERT INTO class (className) VALUES ('$className');";
    $results = mysqli_query($conn,$sql);
    header("location: ../cat-class-adm.php");
}

if (isset($_GET['edit'])){
    $classID = $_GET['edit'];
    $sql = "SELECT * FROM class WHERE classID=$classID;";
    $results = mysqli_query($conn,$sql);

    if(mysqli_num_rows($results)>0){
        $row = mysqli_fetch_array($results);

        $className = $row['className'];
    }
}

if (isset($_POST['edit-class'])){
    $classID = $_POST['classID'];
    $className = $_POST['class-name'];

    $sql = "UPDATE class SET className='$className' WHERE  classID=$classID";
    mysqli_query($conn,$sql);
    header("location: ../cat-class-adm.php");
}

if (isset($_POST['clear-input'])){
    header("location: ../cat-class-adm.php");
}
