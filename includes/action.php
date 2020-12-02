<?php
require 'db.inc.php';

if(isset($_POST['action'])){
    $sql = "SELECT * FROM ships JOIN class ON (ships.shipClass=class.classID) JOIN types ON (ships.shipType=types.typeID) WHERE shipClass !='' ";

    if(isset($_POST['shipClass'])){
        $shipClass = implode("','", $_POST['shipClass']);
        $sql .="AND shipClass IN('".$shipClass."')";
    }
    if(isset($_POST['shipType'])){
        $shipType = implode("','", $_POST['shipType']);
        $sql .="AND shipType IN('".$shipType."')";
    }

    $results = mysqli_query($conn,$sql);
    $output = '';

    if(mysqli_num_rows($results) > 0){
        while ($row = mysqli_fetch_assoc($results)){
            $output .= '<div class="col mb-4">
                                <div class="card">
                                    <img src="'.$row['shipImage'].'" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['shipName'].'</h5>
                                        <p class="card-text">klasa okrętu: '.$row['className'].'</p>
                                        <p class="card-text">typ okrętu: '.$row['typeName'].'</p>
                                        <p class="card-text">cena: '.number_format($row['shipPrice']).'zł</p>
                                        <div class="text-center"><a href="#" class="btn btn-outline-danger">dodaj do koszyka</a></div>
                                    </div>
                                </div>
                            </div>';
        }
    }
    else{
        $output = "<h3>Nie znaleziono produktów!</h3>";
    }

    echo $output;
}
?>