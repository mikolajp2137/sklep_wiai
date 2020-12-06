<?php
require_once 'db.inc.php';

$shipID = 0;
$shipName = '';
$shipClass = '';
$shipType = '';
$shipDraft = '';
$shipLength = '';
$shipDisplacement = '';
$shipSpeed = '';
$shipPrice = '';
$shipImage = '';
$shipDescription = '';

if (isset($_POST['add-product'])){
    $shipName = $_POST['name'];
    $shipClass = $_POST['class'];
    $shipType = $_POST['type'];
    $shipDraft = $_POST['draft'];
    $shipLength = $_POST['length'];
    $shipDisplacement = $_POST['displacement'];
    $shipSpeed = $_POST['speed'];
    $shipPrice = $_POST['price'];
    $shipImage = "images/example.jpeg";
    $shipDescription = $_POST['description'];

    $sql = "INSERT INTO ships (shipName, shipType, shipClass, shipDraft, shipLenght, shipDisplacement, shipSpeed, shipDescription, shipImage, shipPrice) VALUES ('$shipName','$shipType','$shipClass','$shipDraft','$shipLength','$shipDisplacement','$shipSpeed','$shipDescription','$shipImage','$shipPrice');";
    $results = mysqli_query($conn,$sql);
    header("location: ../admin-panel.php");
}

if (isset($_GET['delete'])){
    $shipID = $_GET['delete'];
    $sql = "DELETE FROM ships WHERE shipID=$shipID;";
    mysqli_query($conn,$sql);
    header("location: ../admin-panel.php");
}

if (isset($_GET['edit'])){
    $shipID = $_GET['edit'];
    $sql = "SELECT * FROM ships WHERE shipID=$shipID;";
    $results = mysqli_query($conn,$sql);

    if(mysqli_num_rows($results)>0){
        $row = mysqli_fetch_array($results);

        $shipName = $row['shipName'];
        $shipClass = $row['shipClass'];
        $shipType = $row['shipType'];
        $shipDraft = $row['shipDraft'];
        $shipLength = $row['shipLenght'];
        $shipDisplacement = $row['shipDisplacement'];
        $shipSpeed = $row['shipSpeed'];
        $shipPrice = $row['shipPrice'];
        $shipDescription = $row['shipDescription'];
    }
}

if (isset($_POST['edit-product'])){
    $shipID = $_POST['shipID'];
    $shipName = $_POST['name'];
    $shipClass = $_POST['class'];
    $shipType = $_POST['type'];
    $shipDraft = $_POST['draft'];
    $shipLength = $_POST['length'];
    $shipDisplacement = $_POST['displacement'];
    $shipSpeed = $_POST['speed'];
    $shipPrice = $_POST['price'];
    $shipDescription = $_POST['description'];

    $sql = "UPDATE ships SET shipName='$shipName', shipType='$shipType', shipClass='$shipClass', shipDraft='$shipDraft', shipLenght='$shipLength', shipDisplacement='$shipDisplacement', shipSpeed='$shipSpeed', shipDescription='$shipDescription', shipPrice='$shipPrice' WHERE  shipID=$shipID";
    mysqli_query($conn,$sql);
    header("location: ../admin-panel.php");
}

if (isset($_POST['clear-input'])){
    header("location: ../admin-panel.php");
}