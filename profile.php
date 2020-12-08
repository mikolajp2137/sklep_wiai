<?php
include_once 'header.php';
require "includes/db.inc.php";
?>

<div class="pushNav"></div>

<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="list-group">
                <form action="includes/redirect.inc.php" method="post">
                    <button type="submit" class="list-group-item list-group-item-action active bg-ffnf-blue" name="user-orders">Zakupione okręty</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="user-data">Dane użytkownika</button>
                </form>
            </div>
        </div>

        <div class="col col-lg-9 col-sm-12">
            <?php
            $clientID = $_SESSION['userid'];
            $sql = "SELECT * FROM orderdetails JOIN orders ON orderdetails.F_orderID=orders.orderID JOIN ships ON orderdetails.F_shipID=ships.shipID WHERE orders.F_clientID='$clientID'";
            $results = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($results);
            ?>
            <h3>Zakupione okręty: </h3>
            <div class="center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Ilość</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($results)){ ?>
                        <tr>
                            <td><?= $row['shipName'] ?></td>
                            <td><?= $row['shipPrice'] ?>zł</td>
                            <td><?= $row['quantity'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
