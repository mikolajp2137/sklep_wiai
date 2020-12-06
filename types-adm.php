<?php
include_once 'header-adm.php';
require "includes/db.inc.php";
require_once 'includes/types-crud.inc.php';
?>

<div class="pushNav"></div>

<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="list-group">
                <form action="includes/redirect-adm.inc.php" method="post">
                    <button type="submit" class="list-group-item list-group-item-action" name="products-adm">Produkty</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="cat-class-adm">Klasy produktów</button>
                    <button type="submit" class="list-group-item list-group-item-action active bg-ffnf-blue" name="types-adm">Kategorie produktów</button>
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
            <form action="includes/types-crud.inc.php" method="post">
                <div class="center">
                    <button type="submit" name="clear-input" class="btn btn-outline-danger" style="width: 400px">wyczyść pola dodawania</button>
                </div>
                <input type="hidden" name="typeID" value="<?= $typeID ?>">
                <div class="form-group">
                    <label>Nazwa typu</label>
                    <input type="text" name="type-name" class="form-control" value="<?= $typeName ?>">
                </div>
                <div class="center">
                    <button type="submit" name="add-type" class="btn btn-outline-danger" style="width: 200px">dodaj</button>
                    <button type="submit" name="edit-type" class="btn btn-outline-danger" style="width: 200px">zapisz edycje</button>
                </div>
            </form>
            <?php
            $sql = "SELECT * FROM types;";
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
                        <th scope="col">Akcja</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($results)){ ?>
                        <tr>
                            <td><?= $row['typeName'] ?></td>
                            <td>
                                <a href="types-adm.php?edit=<?= $row['typeID'] ?>" class="btn btn-info">edytuj</a>
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
