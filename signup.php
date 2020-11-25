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
                }elseif ($_GET["error"]=="invalidemail"){
                    echo "<p>Nieprawidłowy email!</p>";
                }elseif ($_GET["error"]=="pwdmismatch"){
                    echo "<p>Hasła muszą się zgadzać!</p>";
                }elseif ($_GET["error"]=="stmtfailed"){
                    echo "<p>Coś poszło nie tak, spróbuj ponownie!</p>";
                }elseif ($_GET["error"]=="emailtaken"){
                    echo "<p>Wybierz inny email!</p>";
                }elseif ($_GET["error"]=="none"){
                    echo "<p>Gratulacje, rejestracja przebiegła poprawnie!</p>";
                }
            }
            ?>

            <form action="includes/signup.inc.php" method="post" class="login-box ">
                <h3>Zarejestruj się</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">imię</label>
                    <input type="text" name="fname" placeholder="imię..." class="form-control" required="" minlength="3" maxlength="32">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">nazwisko</label>
                    <input type="text" name="lname" placeholder="nazwisko..." class="form-control" required="" minlength="3" maxlength="32">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" name="email" placeholder="email..." required="" minlength="3" maxlength="32" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">hasło</label>
                    <input type="password" name="pwd" placeholder="hasło..." required="" minlength="8" maxlength="16" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">powtórz hasło</label>
                    <input type="password" name="pwdrepeat" placeholder="powtórz hasło..." class="form-control" required="" minlength="8" maxlength="16">
                </div>
                <div class="center">
                    <button type="submit" name="submit" class="btn btn-primary btn-outline-danger login-button">zarejestruj</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
