<?php
include_once 'header-adm.php';
require "includes/db.inc.php";

?>

<div class="pushNav"></div>

<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="list-group">
                <form action="includes/redirect-adm.inc.php" method="post">
                    <button type="submit" class="list-group-item list-group-item-action" name="products-adm">Produkty</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="cat-class-adm">Klasy produktów</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="types-adm">Kategorie produktów</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="clients-adm">Klienci</button>
                    <button type="submit" class="list-group-item list-group-item-action active bg-ffnf-blue" name="upload-main-img">Dodawanie zdjęcia głównego</button>
                    <?php
                    if (isset($_SESSION["employeeUID"])){
                        if($_SESSION["employeeUID"]=='admin'){
                            echo "<button type=\"submit\" class=\"list-group-item list-group-item-action\" name=\"employees-adm\">Pracownicy</button>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="col col-lg-9 col-sm-12">
            <div class="form-group">
                <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Okręt</label>
                        <select class="form-control" name="ship">
                            <?php
                            $sql = "SELECT * FROM ships";
                            $results = mysqli_query($conn,$sql);

                            while ($row = mysqli_fetch_assoc($results)){
                                ?>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <option value="<?= $row['shipID'] ?>"><?= $row['shipName'] ?></option>
                                        </label>
                                    </div>
                                </li>

                            <?php } ?>
                        </select>
                    </div>


                    <input type="file" name="ship-image">
                    <button type="submit" name="submit-image">prześlij zdjęcie</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer-adm.php';
?>
