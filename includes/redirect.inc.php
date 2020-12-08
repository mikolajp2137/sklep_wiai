<?php

if (isset($_POST['user-orders'])){
    header("location: ../profile.php");
}
if (isset($_POST['user-data'])){
    header("location: ../profile-user-data.php");
}