<?php
include_once 'header.php';
require "includes/db.inc.php";
?>

<div class="pushNav"></div>

<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="list-group">
                <form action="includes/checkout.inc.php" method="post">
                    <div class="list-group">
                        <span class="list-group-item">Do zapłaty:
                        <?php
                        $clientID = $_SESSION['userid'];
                        $sql = "SELECT * FROM cartdetails JOIN ships ON cartdetails.F_shipID=ships.shipID JOIN cart ON cartdetails.F_cartID=cart.cartID WHERE F_clientID='$clientID';";
                        $results = mysqli_query($conn,$sql);
                        $total = 0;
                        $aux = mysqli_fetch_assoc($results);
                        $userCartID=$aux['cartID'];

                        while ($row = mysqli_fetch_assoc($results)){
                            $total+=$row['quantity']*$row['shipPrice'];
                        }
                        echo $total;
                        ?>
                        zł</span>
                    </div>

                    <input type="hidden" name="user-cart-id" value="<?php echo $userCartID ?>">
                    <button type="submit" class="list-group-item list-group-item-action active bg-ffnf-blue" name="go-to-checkout">Zapłać</button>
                </form>
            </div>
        </div>

        <div class="col col-lg-9 col-sm-12">

            <?php
            $clientID = $_SESSION['userid'];
            $sql = "SELECT * FROM cartdetails JOIN ships ON cartdetails.F_shipID=ships.shipID JOIN cart ON cartdetails.F_cartID=cart.cartID WHERE F_clientID='$clientID';";
            $results = mysqli_query($conn,$sql);
            ?>

            <div class="center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Cena jednostkowa</th>
                        <th scope="col">Ilość</th>
                        <th scope="col">+ / -</th>
                        <th scope="col">Cena łączna</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($results)){ ?>
                        <tr>
                            <td><?= $row['shipName'] ?></td>
                            <td><?= $row['shipPrice'] ?>zł</td>
                            <td><?= $row['quantity'] ?></td>
                            <td>
                                <form action="includes/cart.inc.php" method="post">
                                    <input type="hidden" name='cart-item-id' value="<?= $row['cartDetailID'] ?>">
                                    <button type="submit" class="btn btn-outline-danger" style="width: 40px;" name="increase-quantity">+</button>
                                    <button type="submit" class="btn btn-outline-danger" style="width: 40px;" name="decrease-quantity">-</button>
                                </form>
                            </td>
                            <td><?= $row['quantity']*$row['shipPrice'] ?>zł</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer-adm.php';
?>
