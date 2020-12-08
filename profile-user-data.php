<?php
include_once 'header.php';
require "includes/db.inc.php";
require_once 'includes/profile-user-data.inc.php';
?>

<div class="pushNav"></div>

<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="list-group">
                <form action="includes/redirect.inc.php" method="post">
                    <button type="submit" class="list-group-item list-group-item-action" name="user-orders">Zakupione okręty</button>
                    <button type="submit" class="list-group-item list-group-item-action active bg-ffnf-blue" name="user-data">Dane użytkownika</button>
                </form>
            </div>
        </div>

        <div class="col col-lg-9 col-sm-12">
            <?php
            $clientID = $_SESSION['userid'];
            $sql = "SELECT * FROM clients WHERE clientID='$clientID'";
            $results = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($results);
            $row = mysqli_fetch_assoc($results);

            $clientFname = $row['clientFname'];
            $clientLname = $row['clientLname'];
            $clientPhone = $row['clientPhone'];
            $clientAddress = $row['clientAddress'];
            $clientPostcode = $row['clientPostcode'];
            $clientPost = $row['clientPost'];
            ?>


            <form action="includes/profile-user-data.inc.php" method="post">
                <input type="hidden" name="clientID" value="<?= $clientID ?>">
                <div class="form-group">
                    <label>Imie</label>
                    <input type="text" name="fname" class="form-control" value="<?= $clientFname ?>">
                </div>
                <div class="form-group">
                    <label>Nazwisko</label>
                    <input type="text" name="lname" class="form-control" value="<?= $clientLname ?>">
                </div>
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" name="phone" class="form-control" value="<?= $clientPhone ?>">
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" name="address" class="form-control" value="<?= $clientAddress ?>">
                </div>
                <div class="form-group">
                    <label>Kod pocztowy</label>
                    <input type="text" name="postcode" class="form-control" value="<?= $clientPostcode ?>">
                </div>
                <div class="form-group">
                    <label>Poczta</label>
                    <input type="text" name="post" class="form-control" value="<?= $clientPost ?>">
                </div>
                <div class="center">
                    <button type="submit" name="edit-client" class="btn btn-outline-danger" style="width: 200px">zapisz edycje</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
