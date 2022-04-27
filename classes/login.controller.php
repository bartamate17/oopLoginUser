<?php

require_once "./classes/userDataInsertCheck.classes.php";

class LoginController extends userDataInsertCheck
{
    private $email;
    private $password;

    public function __construct($emailUser, $passUser)
    {
        $this->email = $emailUser;
        $this->password = $passUser;
    }

    public function loginUser()
    {

        $this->checkUserDataLogin($this->email, $this->password);
    }

    private function checkUserDataLogin($email, $pass)
    {
        if ($this->checkUserForLogin($email, $pass) == true) {
            header("Location: main.php");
        } else {
            header("Location: login.php?error=user&passLoginError");
        }
    }
}
