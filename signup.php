<?php
include_once 'header.php';

?>

<main>
    <div class="container">
        <div class="row jc-center">
            <section>
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

                <form action="includes/signup.inc.php" method="post" class="login-box">
                    <h3>Zarejestruj się</h3>
                    <h2>Imię</h2>
                    <input type="text" name="fname" placeholder="imię..." class="login" required="" minlength="3" maxlength="32">
                    <h2>Nazwisko</h2>
                    <input type="text" name="lname" placeholder="nazwisko..." class="login" required="" minlength="3" maxlength="32">
                    <h2>E-mail</h2>
                    <input type="text" name="email" placeholder="email..." class="login" required="" minlength="3" maxlength="32">
                    <h2>Hasło</h2>
                    <input type="password" name="pwd" placeholder="hasło..." class="password" required="" minlength="8" maxlength="16">
                    <h2>Powtórz hasło</h2>
                    <input type="password" name="pwdrepeat" placeholder="powtórz hasło..." class="password" required="" minlength="8" maxlength="16">

                    <input type="submit" name="submit" value="zarejestruj" style="float: bottom" class="login-button">
                </form>


            </section>
        </div>
    </div>
</main>


<?php
include_once 'footer.php';

?>
