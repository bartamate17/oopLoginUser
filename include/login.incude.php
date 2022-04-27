<?php

//bejelentlezés - Log In
if (isset($_POST["submitLogin"])) {

    //tulajdonságok kiszervezése válltozóba
    $email = filter_var($_POST["userName"], FILTER_SANITIZE_EMAIL);
    $pass = $_POST["passWord"];

    //osztályok meghívása
    require_once "./classes/serverConnect.class.php";
    require_once "./classes/userDataInsertCheck.classes.php";
    require_once "./classes/login.controller.php";

    //objektum generálása
    $signUpVariable = new LoginController($email, $pass);

    //metódus lefutása
    $signUpVariable->loginUser();
}
