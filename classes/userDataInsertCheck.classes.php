<?php

require_once "./classes/serverConnect.class.php";

//adatok beágyazása & ellenőrzése a táblában
class userDataInsertCheck extends serverConnect
{
    public function insertUser($userName, $email, $password, $position)
    {
        $hashedPass = hash("sha256", $password);

        $sql = "INSERT INTO userslogin (name, email, password, position)
        VALUES ( ?, ?, ?, ?)";

        $statement = $this->connect()->prepare($sql);

        if (!$statement->execute(array($userName, $email, $hashedPass, $position))) {
            $statement = null;
            header("Location: login.php?error=statementFailed");
            exit();
        }
    }

    protected function checkUser($userName, $email)
    {

        $sql = "SELECT name FROM usersLogin WHERE name = ? AND email = ?";
        $statement = $this->connect()->prepare($sql);

        if (!$statement->execute(array($userName, $email))) {
            $statement = null;
            header("Location: login.php?error=statementFailed");
            exit();
        }

        //ha 0 a sorok száma -> true: nem létezik a felhasználó
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function checkUserForLogin($email, $password)
    {
        $hashedPass = hash("sha256", $password);

        $sql = "SELECT name FROM usersLogin WHERE email = ? AND password = ?";
        $statement = $this->connect()->prepare($sql);

        if (!$statement->execute(array($email, $hashedPass))) {
            $statement = null;
            header("Location: login.php?error=loginFailed");
            exit();
        }

        if ($statement->rowCount() === 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
