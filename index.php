<?php
include_once 'header.php';
?>

    <div class="pushNav"></div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                        <div class="card">
                            <img src="images/example.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    <?php
                                    if (isset($_SESSION["userid"])){
                                        echo "<p>Cześć ".$_SESSION["username"]."!</p>";
                                    }else{
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
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