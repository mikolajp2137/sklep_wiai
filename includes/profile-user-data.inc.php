<?php
require_once 'db.inc.php';


if (isset($_POST['edit-client'])){
    $clientID = $_POST['clientID'];
    $clientFname = $_POST['fname'];
    $clientLname = $_POST['lname'];
    $clientPhone = $_POST['phone'];
    $clientAddress = $_POST['address'];
    $clientPostcode = $_POST['postcode'];
    $clientPost = $_POST['post'];

    $sql = "UPDATE clients SET clientFname='$clientFname', clientLname='$clientLname', clientPhone='$clientPhone', clientAddress='$clientAddress', clientPostcode='$clientPostcode', clientPost='$clientPost' WHERE  clientID=$clientID";
    mysqli_query($conn,$sql);
    header("location: ../profile-user-data.php");
}