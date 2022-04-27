<?php

session_start();

if (isset($_SESSION["userId"]) && isset($_SESSION["email"])) {
?>
    <!DOCTYPE html>
    <html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h2>Sikeres Bejelentkezés!</h2>
        <p><a href="redirect.php">Kijelentkezés</a></p>
    </body>

    </html>
<?php
} else {
    session_destroy();
    header("Location: login.php");
}
?>