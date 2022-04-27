<?php
require_once "./include/signup.include.php";

session_start();

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció | LoginOOP</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>

    <div id="registerDiv">
        <form method="post">
            <h3>Regisztráció:</h3>
            <input type="text" placeholder="Név" name="nameRegister">
            <input type="email" placeholder="E-mail cím" name="emailRegister">
            <input type="password" placeholder="Jelszó" name="passRegister">
            <input type="password" placeholder="Jelszó még egyszer" name="passRegisterRepeat">
            <select name="position">
                <option value="Vezérigazgató">Vezérigazgató</option>
                <option value="Alkalmazott">Alkalmazott</option>
                <option value="Takarító">Takarító</option>
            </select>
            <button type="submit" name="submit">Küldés</button>
        </form>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        //session generálása
        $_SESSION["userId"] = uniqid();
        $_SESSION["email"] = $_POST["emailRegister"];
    }
    ?>
</body>

</html>