<?php
include_once 'header.php';
?>

<div class="pushNavLogReg"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="emptyinput"){
                    echo "<p>Wypełnij wszystkie pola!</p>";
                }elseif ($_GET["error"]=="wronglogin"){
                    echo "<p>Niepoprawne dane logowania!</p>";
                }elseif ($_GET["error"]=="stmtfailed"){
                    echo "<p>Coś poszło nie tak, spróbuj ponownie!</p>";
                }
            }
            ?>

            <form action="includes/admin-login.inc.php" method="post" class="login-box">
                <h3>Logowanie do panelu administracyjnego</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">UID</label>
                    <input type="text" name="eUID" placeholder="login..." required="" minlength="3" maxlength="32" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">hasło</label>
                    <input type="password" name="epwd" placeholder="hasło..." required="" minlength="8" maxlength="16" class="form-control">
                </div>
                <div class="center">
                    <button type="submit" name="submit" class="btn btn-primary btn-outline-danger login-button">zaloguj</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
