<?php
include_once 'header-adm.php';
require "includes/db.inc.php";
require_once 'includes/product-crud.inc.php';
?>

<div class="pushNav"></div>

<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="list-group">
                <form action="includes/redirect-adm.inc.php" method="post">
                    <button type="submit" class="list-group-item list-group-item-action active bg-ffnf-blue" name="products-adm">Produkty</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="cat-class-adm">Klasy i kategorie produktów</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="clients-adm">Klienci</button>
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
            <form action="includes/product-crud.inc.php" method="post">
                <div class="center">
                    <button type="submit" name="clear-input" class="btn btn-outline-danger" style="width: 400px">wyczyść pola dodawania</button>
                </div>
                <input type="hidden" name="shipID" value="<?= $shipID ?>">
                <div class="form-group">
                    <label>Nazwa</label>
                    <input type="text" name="name" class="form-control" value="<?= $shipName ?>">
                </div>
                <div class="form-group">
                    <label>Klasa</label>
                    <select class="form-control" name="class">
                        <?php
                        $sql = "SELECT * FROM class";
                        $results = mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_assoc($results)){
                            ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <option value="<?= $row['classID'] ?>" <?php if($shipClass==$row['classID']){ echo ' selected="selected"';} ?>><?= $row['className'] ?></option>
                                    </label>
                                </div>
                            </li>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Typ</label>
                    <select class="form-control" name="type">
                        <?php
                        $sql = "SELECT * FROM types";
                        $results = mysqli_query($conn,$sql);

                        while ($row = mysqli_fetch_assoc($results)){
                            ?>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <option value="<?= $row['typeID'] ?>" <?php if($shipType==$row['typeID']){ echo ' selected="selected"';} ?>><?= $row['typeName'] ?></option>
                                    </label>
                                </div>
                            </li>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Zanurzenie</label>
                    <input type="text" name="draft" class="form-control" value="<?= $shipDraft ?>">
                </div>
                <div class="form-group">
                    <label>Długość</label>
                    <input type="text" name="length" class="form-control" value="<?= $shipLength ?>">
                </div>
                <div class="form-group">
                    <label>Tonaż</label>
                    <input type="text" name="displacement" class="form-control" value="<?= $shipDisplacement ?>">
                </div>
                <div class="form-group">
                    <label>Prędkość</label>
                    <input type="text" name="speed" class="form-control" value="<?= $shipSpeed ?>">
                </div>
                <div class="form-group">
                    <label>Cena</label>
                    <input type="text" name="price" class="form-control" value="<?= $shipPrice ?>">
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea class="form-control" name="description" rows="3"><?= $shipDescription ?></textarea>
                </div>
                <div class="center">
                    <button type="submit" name="add-product" class="btn btn-outline-danger" style="width: 200px">dodaj</button>
                    <button type="submit" name="edit-product" class="btn btn-outline-danger" style="width: 200px">zapisz edycje</button>
                </div>
            </form>

            <?php
            $sql = "SELECT * FROM ships JOIN class ON (ships.shipClass=class.classID) JOIN types ON (ships.shipType=types.typeID);";
            $results = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($results);
            ?>
            <hr>
            <div class="pushNavLogReg"></div>
            <div class="center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Klasa</th>
                        <th scope="col">Typ</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Akcja</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($results)){ ?>
                    <tr>
                        <td><?= $row['shipName'] ?></td>
                        <td><?= $row['className'] ?></td>
                        <td><?= $row['typeName'] ?></td>
                        <td><?= $row['shipPrice'] ?>zł</td>
                        <td>
                            <a href="admin-panel.php?edit=<?= $row['shipID'] ?>" class="btn btn-info">edytuj</a>
                            <a href="includes/product-crud.inc.php?delete=<?= $row['shipID'] ?>" class="btn btn-danger">usuń</a>
                        </td>
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
