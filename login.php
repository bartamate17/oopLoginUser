<?php
require_once "./include/login.incude.php";

session_start();

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés | LoginOOP</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>

    <div id="loginDiv">
        <form method="post">
            <h3>Bejelentkezés:</h3>
            <input type="text" name="userName" placeholder="E-mail cím">
            <input type="password" name="passWord" placeholder="Jelszó">
            <button type="submit" name="submitLogin">Küldés</button>
            <label for="submit"><a href="register.php">Regisztrálok</a></label>
        </form>
    </div>
    <?php
    if (isset($_POST["submitLogin"])) {
        //session generálása
        $_SESSION["userId"] = uniqid();
        $_SESSION["email"] = $_POST["userName"];
    }
    ?>
</body>

</html>