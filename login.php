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

            <form action="includes/login.inc.php" method="post" class="login-box">
                <h3>Zaloguj się</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" name="email" placeholder="email..." required="" minlength="3" maxlength="32" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">hasło</label>
                    <input type="password" name="pwd" placeholder="hasło..." required="" minlength="8" maxlength="16" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">zapamiętaj mnie</label>
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
