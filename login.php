<?php
include_once 'header.php';

?>

<main>
    <div class="container">
        <div class="row jc-center">
            <section>
                <form action="includes/login.inc.php" method="post" class="login-box">
                    <h3>Zaloguj się</h3>
                    <h2>E-mail</h2>
                    <input type="text" name="email" placeholder="email..." class="login" required="" minlength="3" maxlength="32">
                    <h2>Hasło</h2>
                    <input type="password" name="pwd" placeholder="hasło..." class="password" required="" minlength="8" maxlength="16">

                    <input type="submit" name="submit" value="zaloguj" style="float: bottom" class="login-button">
                </form>
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
            </section>
        </div>
    </div>
</main>


<?php
include_once 'footer.php';

?>
