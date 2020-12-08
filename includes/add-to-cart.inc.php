<?php
session_start();
require 'db.inc.php';

if (isset($_POST['add-to-cart'])){
    $shipID = $_POST['pid'];
    $clientID = $_SESSION['userid'];
    $itemQuantity = 1;

    $sql = "SELECT * FROM cart WHERE F_clientID='$clientID'";
    $result = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($result);
    $exists = mysqli_num_rows($result);
    $cartID = $r['cartID'];
    if($exists < 1){
        $sql = "INSERT INTO cart (F_clientID) VALUES ($clientID)";
        mysqli_query($conn,$sql);
    }

    $sql = "SELECT * FROM cartdetails WHERE F_cartID='$cartID' AND F_shipID='$shipID'";
    $result = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($result);
    $exists = mysqli_num_rows($result);
    if($exists < 1){
        $sql = "INSERT INTO cartdetails (F_cartID, F_shipID, quantity) VALUES ($cartID,$shipID,$itemQuantity)";
        mysqli_query($conn,$sql);
        header("location: ../index.php");
    }else{
        $itemQuantity = $r['quantity']+1;
        $sql = "UPDATE cartdetails SET quantity='$itemQuantity' WHERE F_cartID='$cartID' AND F_shipID='$shipID'";
        mysqli_query($conn,$sql);
        header("location: ../index.php");
    }

}