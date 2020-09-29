<?php

//require_once("crud.php");
require_once("ConnectionHandler.php");





function createUser()
{


    $con = ConnectionHandler::createConnection('ourWebPage');

    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];


    $query = "INSERT into Azubis (Username,Password,Name,Lastname) values ('$username','$password','$firstname','$lastname')";
    $mysql = mysqli_query($con, $query) or die (mysqli_error($con));



    $con->close();


}


function getDataById($id)
{
    $con = ConnectionHandler::createConnection('ourWebPage');
    $result = $con->query("SELECT *
    FROM Azubis a 
    where ID = " . $_POST['edit-id']);
    return $result->fetch_assoc();
}

function updateRow($username,$password,$name,$lastname,$id){
    $con = ConnectionHandler::createConnection('ourWebPage');
    $sql = "update `Azubis` set `Username`=?,`Password`=?,`Name`=?,`Lastname`=? where `id`=?";
    if (!$stmt = $con->prepare($sql)) {
        echo $con->error;
    };

    $stmt->bind_param('ssssi', $username, $password, $name, $lastname, $id);
    $stmt->execute();

}

function deleteRow(){
    $con=ConnectionHandler::createConnection('ourWebPage');
    $sql="DELETE FROM Azubis where id=".$_POST['delete-id'];
    $mysql = mysqli_query($con, $sql) or die (mysqli_error($con));


    $con->close();
}


if (isset($_POST['delete_button'])){
    deleteRow();
}

$username = null;
$pw = null;
$name = null;
$lastname = null;
if (isset($_POST['edit_button'])) {
    $data = getDataById($_POST['edit-id']);
    $username = $data['Username'];
    $pw = $data['Password'];
    $name = $data['Name'];
    $lastname = $data['Lastname'];
}

if (isset($_POST['save'])) {



    $username = $_POST['Username'];
    $pw = $_POST['Password'];
    $name = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $id = $_POST['id'];


    if ($id==null) {
        createUser();
    } else {

        updateRow($username, $pw, $name, $lastname, $id);

    }


    updateRow($username, $pw, $name, $lastname, $id);
}






?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form.css">
    <script src="https://kit.fontawesome.com/abbbcfcd25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h1>ADMIN PANEL</h1>
        </div>
    </div>
    <div class="login_form_home">

        <form action="" method="post">
            <div class="d-flex justify-content-end">

                <button type="submit" value="" name="create " value="create" class="btn btn-primary bg-success"
                        title="create new user"><i class="fa fa-plus"></i>
            </div>
            </button>
            <input type="text"
                   name="Username"
                <?php echo $username != null ? "value= $username" : 'placeholder="Azubis Username here.."'; ?>
                   class="form-control" required>
            <input type="password" name="Password"
                <?php echo $pw != null ? "value= $pw" : 'placeholder="Azubis Password here.."'; ?>
                   class="form-control" required>
            <input type="text" name="FirstName"
                <?php echo $name != null ? "value= $name" : 'placeholder="Azubis firstname here.."'; ?>
                   class="form-control" required>
            <input type="text" name="LastName"
                <?php echo $lastname != null ? "value= $lastname" : 'placeholder="Azubis lastname here.."'; ?>
                   class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $_POST['edit-id']; ?>"/>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success " type="submit" name="save"><i
                            class="fas fa-save"> Save</i>
                </button>
            </div>
        </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        $conn = ConnectionHandler::createConnection('ourWebPage');
        $query = "SELECT * FROM Azubis";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                    <td>' . $row['ID'] . '</td>
                    <td>' . $row['Username'] . '</td>
                    <td>' . $row['Name'] . '</td>
                    <td>' . $row['Lastname'] . '</td>                    
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

