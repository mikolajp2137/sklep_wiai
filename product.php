<?php
include_once 'header.php';
include 'includes/db.inc.php';
?>

<div class="pushNavLogReg"></div>

<div class="container">

    <?php
    $shipID = mysqli_real_escape_string($conn, $_GET['shipID']);
    $sql = "SELECT * FROM ships JOIN class ON (ships.shipClass=class.classID) JOIN types ON (ships.shipType=types.typeID) WHERE ships.shipID='$shipID'";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if($queryResult > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo '<div class="row">
                        <div class="col col-md-5">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="'.$row['shipImage'].'" class="d-block w-100  slider" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/placeholder.png" class="d-block w-100 slider" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                
                        <div class="col-md-7">
                            <h1>'.$row['shipName'].'</h1>
                            <h5>klasa: '.$row['className'].'</h5>
                            <h5>typ: '.$row['typeName'].'</h5>
                            <h5>zanurzenie: '.$row['shipDraft'].'m</h5>
                            <h5>długość: '.$row['shipLenght'].'m</h5>
                            <h5>tonaż: '.$row['shipDisplacement'].'t</h5>
                            <h5>prędkość: '.$row['shipSpeed'].' węzłów</h5>
                            <div class="pushNav"></div>
                            <h4>cena: '.$row['shipPrice'].'zł</h4>
                            <div class="pushNav"></div>
                            <form action="includes/add-to-cart.inc.php" method="post">
                                <input type="hidden" name=\'pid\' value="'.$row['shipID'].'">
                                <button type="submit" name="add-to-cart"class="btn btn-outline-danger addItemBtn">dodaj do koszyka</button>
                            </form>
                        </div>
                    </div>
                    <div class="pushNavLogReg"></div>
                    <div class="row">
                        <p>'.$row['shipDescription'].'</p>
                    </div>';
        }
    }else{
        echo "<h5>brak takiego produktu!</h5>";
    }
    ?>
</div>

<?php
include_once 'footer.php';
?>
