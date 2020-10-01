<?php


class ConnectionHandler
{
    //creates connection to database
    public static function createConnection(string $db="ourWebPage")
    {
        $servername = "mysql";
        $username = "root";
        $password = "root";
        $conn = new mysqli($servername, $username, $password, $db);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}