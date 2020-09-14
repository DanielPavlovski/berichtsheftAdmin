<?php


//creates connection to database
function createConnection()
{

    $servername = "mysql";
    $username = "root";
    $password = "root";
    $db = "ourWebPage";

    $conn = new mysqli($servername, $username, $password, $db);
    mysqli_set_charset($conn, 'UTF8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;

}

function createUser()
{


    $conn = createConnection();
    $id = $_POST['Id'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];


    $query = "INSERT into Persons (Username,Password,Name,Lastname) values ('$username','$password','$firstname','$lastname')";
    $mysql = mysqli_query($conn, $query) or die (mysqli_error($conn));

    if ($mysql) {

        echo "success";
    } else {
        echo "error";
    }
    $conn->close();


}


function deleteUser()
{

    $conn = createConnection();
    $id = $_POST['Id'];
    $query = "DELETE FROM Persons WHERE id = " . $id;
    $mysql = mysqli_query($conn, $query) or die (mysqli_error($conn));
    if ($mysql) {

        echo "success";
    } else {
        echo "error";
    }
    $conn->close();


}


function readAllUsers()
{

    $conn = createConnection();
    $query = "SELECT ID, Username, Password, Name, Lastname
FROM Persons";


    $mysql = mysqli_query($conn, $query) or die (mysqli_error($conn));
    echo "<table>";

    while ($row = mysqli_fetch_array($mysql)) {


        echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Username'] . "</td> <td>" . $row['Password'] . "</td> <td>" . $row['Name'] . "</td> <td>" . $row['Lastname'] . "</td> </tr>       ";


    }
    echo "</table>";
    $conn->close();


}

function updateUser(){

$conn = createConnection();

    $id = $_POST['Id'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];


$query = "UPDATE Persons
SET Username='" . $username ."', Password='".$password."', Name='".$firstname."', Lastname='".$lastname.
"'WHERE id=" . $id;



    $mysql = mysqli_query($conn, $query) or die (mysqli_error($conn));
    if ($mysql) {

        echo "success";
    } else {
        echo "error";
    }
    $conn->close();


}

function crud () {
if (isset($_POST['create'])) {
    createUser();
} else if (isset($_POST['delete'])) {

     deleteUser();
} else if (isset($_POST['read'])) {
    readAllUsers();
}else if (isset($_POST['update'])) {
    updateUser();

}




}

crud();

