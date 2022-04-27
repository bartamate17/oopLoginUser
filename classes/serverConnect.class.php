<?php

//PDO connects
class serverConnect
{
    protected function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "insertphp";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Hibás csatlakozás: " . $e->getMessage();
            die();
        }
        return $conn;
    }
}
