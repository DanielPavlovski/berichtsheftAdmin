<?php
require_once "ConnectionHandler.php";

$con = ConnectionHandler::createConnection('ourWebPage');
//$username = logedInUser ();
//$username = "Daniel";

session_start();
$username = $_SESSION['username'];

$queryUserId = "SELECT ID FROM Azubis a WHERE a.Username='" . $username . " ' ";
$User = $con->query($queryUserId);

while ($row = $User->fetch_assoc()) {
    $UserId = $row['ID'];  //Users id

}


$queryUserInputs = "SELECT * FROM Berichte b WHERE b.userID='" . $UserId . "'";
$UserInputs = $con->query($queryUserInputs);


if (isset($_POST['save'])) {


    $username = $_POST['Username'];
    $pw = $_POST['Password'];
    $name = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $id = $_POST['id'];


    if ($id == null) {
        createUser();
    } else {

        updateRow($username, $pw, $name, $lastname, $id);

    }

}
function createUser()
{

    $con = ConnectionHandler::createConnection('ourWebPage');
    session_start();
    $username = $_SESSION['username'];

    $queryUserId = "SELECT ID FROM Azubis a WHERE a.Username='" . $username . " ' ";
    $User = $con->query($queryUserId);

    while ($row = $User->fetch_assoc()) {
        $UserId = $row['ID'];  //Users id

    }


    $text = $_POST['input_area'];
    $datum = date("Y-m-d");


    $query = "INSERT into Berichte (Text,Datum,userID) values ('$text','$datum','$UserId')";


    $mysql = mysqli_query($con, $query) or die (mysqli_error($con));


    $con->close();


}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
    <script src="https://kit.fontawesome.com/abbbcfcd25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<style>
    td {
        border-top: white solid;


    }

</style>

</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h1>WELCOME <?php echo strtoupper($username) ?>   </h1>

        </div>


        <form action="" method="post">


            <div class="d-flex justify-content-end">

                <button type="submit" value="" name="create " value="create" class="btn btn-primary bg-success"
                        title="create new user"><i class="fa fa-plus"></i>
            </div>


            <textarea required name="input_area" rows="6" cols="130"
                      placeholder="Hallo, was hast du Heute gemacht? :)"></textarea>


            <div class="d-flex justify-content-end">
                <button class="btn btn-success " type="submit" name="save"><i
                            class="fas fa-save"> Save</i>
                </button>
            </div>
    </div>


    <table>
        <tr>
            <th>Berichte</th>
            <th>Date of input</th>

            <th></th>
            <th></th>
        </tr>


        <?php

        if ($UserInputs->num_rows > 0) {
            while ($row = $UserInputs->fetch_assoc()) {

                echo '<tr>
<td id="text">' . $row['Text'] . '</td>
<td id="date">' . $row['Datum'] . '</td>




   <td class="action_buttons">
                    <form action="" method="post">
                        <button type="submit" name="edit_button" title="edit selected user" value="edit"
                                class="btn  btn-primary bg-warning">
                            <i class="fas fa-user-edit"> Edit</i>
                        </button>
                        <input type="hidden" name="edit-id" value="' . $row['ID'] . '">
                    <form>
                    </td>
                    <td class="action_buttons">
                      <form action="" method="post">
                        <button type="submit" name="delete_button" value="delete"
                                class="btn  btn-primary  bg-danger"
                                title="delete selected user"><i class="fas fa-trash-alt"> Delete
                            </i>
                      
                      
                      
                        </button>
                        <input type="hidden" name="delete-id" value="' . $row['ID'] . '">
                        
                        </form>
                    </td>



</tr>';

            }

        }


        ?>


    </table>


</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>
