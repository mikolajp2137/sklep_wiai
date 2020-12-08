<?php
session_start();
require 'db.inc.php';

if (isset($_POST['increase-quantity'])){
    $cartDetailID = $_POST['cart-item-id'];


    $sql = "SELECT * FROM cartdetails WHERE cartDetailID='$cartDetailID'";
    $result = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($result);
    $itemQuantity = $r['quantity'];
    $exists = mysqli_num_rows($result);

    if($exists > 0){
        $itemQuantityNew = $itemQuantity+1;
        $sql = "UPDATE cartdetails SET quantity='$itemQuantityNew' WHERE cartDetailID='$cartDetailID'";
        mysqli_query($conn,$sql);
        header("location: ../cart.php");
    }
}
if (isset($_POST['decrease-quantity'])){
    $cartDetailID = $_POST['cart-item-id'];


    $sql = "SELECT * FROM cartdetails WHERE cartDetailID='$cartDetailID'";
    $result = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($result);
    $itemQuantity = $r['quantity'];
    $exists = mysqli_num_rows($result);

    if($exists > 0){
        if($itemQuantity==1){
           $sql = "DELETE FROM cartdetails WHERE cartDetailID='$cartDetailID';";
           mysqli_query($conn,$sql);
           header("location: ../cart.php");
        }else{
            $itemQuantityNew = $itemQuantity-1;
            $sql = "UPDATE cartdetails SET quantity='$itemQuantityNew' WHERE cartDetailID='$cartDetailID'";
            mysqli_query($conn,$sql);
            header("location: ../cart.php");
        }
    }
}