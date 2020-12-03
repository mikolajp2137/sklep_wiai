<?php
    include_once 'header.php';
    include 'includes/db.inc.php';
?>

<div class="pushNavLogReg"></div>

<div class="container">

    <div class="row">
        <div class="col col-lg-9 col-sm-12">
            <div class="center">
                <h3>Wyniki wyszukiwania</h3>
                <div class="pushNavLogReg"></div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                if(isset($_POST['submit-search'])){
                    $search = mysqli_real_escape_string($conn, $_POST['search']);
                    $sql = "SELECT * FROM ships JOIN class ON (ships.shipClass=class.classID) JOIN types ON (ships.shipType=types.typeID) WHERE ships.shipName LIKE '%$search%' OR class.className LIKE '%$search%' OR types.typeName LIKE '%$search%'";

                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);

                    if($queryResult > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo '<div class="col mb-4">
                                <div class="card">
                                    <img src="'.$row['shipImage'].'" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="product.php?shipID='.$row['shipID'].'"><h5 class="card-title">'.$row['shipName'].'</h5></a>
                                        <p class="card-text">klasa okrętu: '.$row['className'].'</p>
                                        <p class="card-text">typ okrętu: '.$row['typeName'].'</p>
                                        <p class="card-text">cena: '.number_format($row['shipPrice']).'zł</p>
                                        <div class="text-center"><a href="#" class="btn btn-outline-danger">dodaj do koszyka</a></div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }else{
                        echo "<h5>brak wyników spełniających warunki wyszukiwania</h5>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
