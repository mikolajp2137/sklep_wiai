<?php
session_start();
require 'db.inc.php';

if(isset($_POST['go-to-checkout'])){
    $clientID = $_SESSION['userid'];
    $F_cartID = $_POST['user-cart-id'];

    $sql = "INSERT INTO orders (F_clientID) VALUES ($clientID)";
    mysqli_query($conn,$sql);

    $sql = "SELECT * FROM orders WHERE F_clientID='$clientID' ORDER BY orderID DESC LIMIT 0,1";
    $result_aux = mysqli_query($conn,$sql);
    $r_aux = mysqli_fetch_assoc($result_aux);
    $newOrder = $r_aux['orderID'];


    $sql = "SELECT * FROM cartdetails JOIN cart ON cartdetails.F_cartID=cart.cartID WHERE cart.F_clientID='$clientID';";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)){
        $F_shipID = $row['F_shipID'];
        $quantity = $row['quantity'];

        $sql = "INSERT INTO orderdetails (F_orderID, F_shipID, quantity) VALUES ($newOrder,$F_shipID,$quantity);";
        mysqli_query($conn,$sql);
    }

    $sql = "DELETE FROM cartdetails WHERE F_cartID=".$F_cartID.";";
    mysqli_query($conn,$sql);
    header("location: ../cart.php");
}