<?php
include_once 'header.php';
include_once "includes/db.inc.php";
?>

    <div class="pushNav"></div>

    <div class="container">
        <div class="row">
            <div class="col col-lg-3 col-sm-12">
                <h5>Filtr produktów</h5>
                <hr>
                <h6 class="text-info">Klasa</h6>
                <ul class="list-group">
                    <?php
                    $sql = "SELECT DISTINCT ships.shipClass ,class.className FROM ships JOIN class ON (ships.shipClass=class.classID);";
                    $results = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($results)){
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?php $row['shipClass']; ?>" id="shipClass"><?php echo $row['className']; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <h6 class="text-info">Typ</h6>
                <ul class="list-group">
                    <?php
                    $sql = "SELECT DISTINCT ships.shipType, types.typeName FROM ships JOIN types ON (ships.shipType=types.typeID);";
                    $results = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($results)){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?php $row['shipType']; ?>" id="shipType"><?php echo $row['typeName']; ?>
                                </label>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col col-lg-9 col-sm-12">
                <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    $sql = "SELECT * FROM ships JOIN class ON (ships.shipClass=class.classID) JOIN types ON (ships.shipType=types.typeID);";
                    $results = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($results);

                    if($resultCheck>0){
                        while ($row = mysqli_fetch_assoc($results)){
                            echo "<div class=\"col mb-4\">";
                            echo "<div class=\"card\">";
                            echo "<img src=".$row['shipImage']." class=\"card-img-top\" alt=\"...\">";
                            echo "<div class=\"card-body\">";
                            echo "<h5 class=\"card-title\">".$row['shipName']."</h5>";
                            echo "<p class=\"card-text\">klasa okrętu: ".$row['className']."</p>";
                            echo "<p class=\"card-text\">typ okrętu: ".$row['typeName']."</p>";
                            echo "<p class=\"card-text\">cena: ".$row['shipPrice']."zł</p>";
                            echo "</div></div></div>";
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