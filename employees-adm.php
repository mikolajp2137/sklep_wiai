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
                    <button type="submit" class="list-group-item list-group-item-action" name="products-adm">Produkty</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="cat-class-adm">Klasy produktów</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="types-adm">Kategorie produktów</button>
                    <button type="submit" class="list-group-item list-group-item-action" name="clients-adm">Klienci</button>
                    <?php
                    if (isset($_SESSION["employeeUID"])){
                        if($_SESSION["employeeUID"]=='admin'){
                            echo "<button type=\"submit\" class=\"list-group-item list-group-item-action active bg-ffnf-blue\" name=\"employees-adm\">Pracownicy</button>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="col col-lg-9 col-sm-12">




        </div>
    </div>
</div>

<?php
include_once 'footer-adm.php';
?>
