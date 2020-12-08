<?php
require_once 'db.inc.php';

if(isset($_POST['submit-image'])){
    if (isset($_POST['ship'])){
        $file = $_FILES['ship-image'];

        $shipID = $_POST['ship'];
        $fileName = $_FILES['ship-image']['name'];
        $fileTmpName = $_FILES['ship-image']['tmp_name'];
        $fileSize = $_FILES['ship-image']['size'];
        $fileError = $_FILES['ship-image']['error'];
        $fileType = $_FILES['ship-image']['type'];

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpeg','jpg','png');

        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 500000){
                    $fileNameNew = "main_".$shipID.".".$fileActualExt;
                    $fileDestination = '../images/product_images/'.$fileNameNew;
                    $fileDestinationFake = 'images/product_images/'.$fileNameNew;

                    move_uploaded_file($fileTmpName,$fileDestination);
                    $sql = "UPDATE ships SET shipImage='$fileDestinationFake' WHERE  shipID=$shipID;";
                    mysqli_query($conn,$sql);

                    header("location: ../upload.php");
                }else{
                    echo "Wybrany plik jest zbyt duży!";
                    header("location: ../upload.php");
                }
            }else{
                echo "Wystąpił problem przy wgrywaniu zdjęcia!";
                header("location: ../upload.php");
            }
        }else{
            echo "Nieprawidłowy typ pliku!";
            header("location: ../upload.php");
        }
    }
}