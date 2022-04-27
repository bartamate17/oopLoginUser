<?php

//Register - Sign Up
if (isset($_POST["submit"])) {

    //tulajdonságok kiszervezése válltozóba + szűrés és ellenőrzés
    $name = filter_var($_POST["nameRegister"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST["emailRegister"], FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_var($_POST["passRegister"], FILTER_SANITIZE_SPECIAL_CHARS);
    $pass2 = filter_var($_POST["passRegisterRepeat"], FILTER_SANITIZE_EMAIL);
    $position = filter_var($_POST["position"], FILTER_SANITIZE_EMAIL);

    //osztályok meghívása
    require_once "./classes/serverConnect.class.php";
    require_once "./classes/userDataInsertCheck.classes.php";
    require_once "./classes/signup.controller.php";

    //objektum generálás
    $signUpVariable = new SignUpController($name, $pass, $pass2, $email, $position);

    //metódus futtatása
    $signUpVariable->signUpUser();

    //session generálása
    $_SESSION["userId"] = uniqid();
    $_SESSION["email"] = $email;

    //belépés
    header("Location: main.php");
}
