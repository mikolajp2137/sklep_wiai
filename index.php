<?php
include_once 'header.php';
require "includes/db.inc.php";
?>

    <div class="pushNav"></div>

    <div class="container">
        <row>
            <form action="search.php" method="post" class="search-box">
                <h3>Wyszukaj</h3>
                <div class="form-group">
                    <input type="text" name="search" placeholder="nazwa, klasa lub typ..." class="form-control">
                </div>
                <div class="center">
                    <button type="submit" name="submit-search" class="btn btn-primary btn-outline-danger login-button">wyszukaj</button>
                </div>
            </form>
        </row>

        <div class="row">
            <div class="col col-lg-3 col-sm-12">
                <h5>Filtr produktów</h5>
                <hr>
                <h6 class="text-info ffnf-blue">Typ</h6>
                <ul class="list-group">
                    <?php
                    $sql = "SELECT DISTINCT ships.shipType, types.typeName FROM ships JOIN types ON (ships.shipType=types.typeID);";
                    $results = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($results)){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['shipType']; ?>" id="shipTypeI"><?php echo $row['typeName']; ?>
                                </label>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <h6 class="text-info ffnf-blue">Klasa</h6>
                <ul class="list-group">
                    <?php
                    $sql = "SELECT DISTINCT ships.shipClass ,class.className FROM ships JOIN class ON (ships.shipClass=class.classID);";
                    $results = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($results)){
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?= $row['shipClass']; ?>" id="shipClassI"><?php echo $row['className']; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col col-lg-9 col-sm-12">
                <div class="row row-cols-1 row-cols-md-3" id="resultI">
                    <?php
                    $sql = "SELECT * FROM ships JOIN class ON (ships.shipClass=class.classID) JOIN types ON (ships.shipType=types.typeID);";
                    $results = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($results);

                    if($resultCheck>0){
                        while ($row = mysqli_fetch_assoc($results)){
                            ?>
                            <div class="col mb-4">
                                <div class="card">
                                    <img src="<?= $row['shipImage'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="product.php?shipID=<?= $row['shipID'] ?>"><h5 class="card-title"><?= $row['shipName'] ?></h5></a>
                                        <p class="card-text">klasa okrętu: <?= $row['className'] ?></p>
                                        <p class="card-text">typ okrętu: <?= $row['typeName'] ?></p>
                                        <p class="card-text">cena: <?= number_format($row['shipPrice']) ?>zł</p>
                                        <div class="text-center"><a href="#" class="btn btn-outline-danger">dodaj do koszyka</a></div>
                                    </div>
                                </div>
                            </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $(".product_check").click(function () {
                var action = 'data';
                var shipClass = get_filter_text('shipClassI');
                var shipType = get_filter_text('shipTypeI');

                $.ajax({
                    url:'includes/action.php',
                    method: 'POST',
                    data:{action:action, shipClass:shipClass,shipType:shipType},
                    success:function(response){
                        $("#resultI").html(response);
                    }
                })
            });


            function get_filter_text(text_id) {
                var filterData = [];
                $('#'+ text_id +':checked').each(function () {
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
    </script>

<?php
include_once 'footer.php';
?>