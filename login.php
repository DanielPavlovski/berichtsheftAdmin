<?php
require_once "ConnectionHandler.php";

$con = ConnectionHandler::createConnection('berichtsheftPlayground');
$username = $_POST['u'];
$password = $_POST['p'];
$sql = "SELECT *
FROM Azubis a 
where a.Username='" . $username . "' and a.Password='" . $password . "'";
$result = $con->query($sql);
if (!$result->num_rows) {
    header('location:'.$_SERVER['HTTP_REFERER'].'?error=1&errorCode=401',true,302);
    die();
}

header('location:'.$_SERVER['HTTP_REFERER'].'homepage.php',true,302);

