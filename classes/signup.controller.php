<?php

require_once "./classes/userDataInsertCheck.classes.php";

class SignUpController extends userDataInsertCheck
{
    private $userName;
    private $userPassword;
    private $userPasswordSecond;
    private $userEmail;
    private $position;
    private $result;

    //érték hozzárendelés a tulajdonságokhoz
    public function __construct($name, $pass, $pass2, $email, $position)
    {
        $this->userName = $name;
        $this->userPassword = $pass;
        $this->userPasswordSecond = $pass2;
        $this->userEmail = $email;
        $this->position = $position;
    }

    public function signUpUser()
    {
        if ($this->emptyInput() == false) {

            header("Location: login.php?error=emptyInput");
            exit();
        }

        if ($this->emailValid() == false) {

            header("Location: login.php?error=invalidEmail");
            exit();
        }

        if ($this->passwordMatch() == false) {

            header("Location: login.php?error=invalidPass");
            exit();
        }

        if ($this->checkUser($this->userName, $this->userEmail) == false) {

            header("Location: login.php?error=usernameExist");
            exit();
        }

        $this->insertUser($this->userName, $this->userEmail, $this->userPassword, $this->position);
    }

    //üres input mező kezelése
    private function emptyInput()
    {
        if (empty($this->userName) || empty($this->userPassword)  || empty($this->userPasswordSecond) || empty($this->userEmail) || empty($this->position)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    //valid e-mail check
    private function emailValid()
    {
        if (filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //jelszó egyezés ellenőrzés
    private function passwordMatch()
    {
        if ($this->userPassword === $this->userPasswordSecond) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
