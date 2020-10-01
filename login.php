<?php
require_once "ConnectionHandler.php";

session_start();

$con = ConnectionHandler::createConnection('ourWebPage');
$username = $_POST['u'];
$password = $_POST['p'];
$sql = "SELECT *
FROM Admin a 
where a.Username='" . $username . "' and a.Password='" . $password . "'";
$result = $con->query($sql);



$sql_user = "SELECT *
FROM Azubis a 
where a.Username='" . $username . "' and a.Password='" . $password . "'";
$result_azubi = $con->query($sql_user);


if ((!$result->num_rows) && (!$result_azubi->num_rows)) {
    header('location:' . $_SERVER['HTTP_REFERER'] . '?error=1&errorCode=401', true, 302);
    die();
} else {

    $_SESSION['username'] = $_POST['u'];

    if ($result->num_rows) {

        header('location:' . $_SERVER['HTTP_REFERER'] . 'homepage.php', true, 302);
    }

    if ($result_azubi->num_rows) {
        header('location:' . $_SERVER['HTTP_REFERER'] . 'userHomepage.php', true, 302);
    }


}










/*

if (!$result_azubi->num_rows) {
    header('location:' . $_SERVER['HTTP_REFERER'] . '?error=1&errorCode=401', true, 302);
    die();

}else {
        header('location:'.$_SERVER['HTTP_REFERER'].'userHomepage.php',true,302);
}

*/