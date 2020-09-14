<?php

require_once("crud.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<div class="container">


    <div class="login_form_home">
        <h1 id="admin_panel">ADMIN PANEL</h1>
        <form action="" method="post">



                <button type="submit" value="" name="create" class="btn  btn-primary ">create new
                    user
                </button>

                <button type="submit" value="" name="update" class="btn btn-primary ">update
                    existing user
                </button>
                <button type="submit" value="" name="read" class="btn btn-primary  btn-large">see all
                    users
                </button>
                <button type="submit" value="" name="delete" class="btn btn-primary  btn-large">delete user
                    using id
                </button>


            <input type="number" name="Id" placeholder="Azubis Id here.." class="form-control">

            <input type="text" name="Username" placeholder="Azubis Username here.." class="form-control">

            <input type="password" name="Password" placeholder="Azubis Password here.." class="form-control"
            >
            <input type="text" name="FirstName" placeholder="Azubis firstname here.." class="form-control">

            <input type="text" name="LastName" placeholder="Azubis lastname here.." class="form-control">



        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Firstname</th>
            <th>Lastname</th>
        </tr>
        <?php
        $conn = createConnection();
        $query = "SELECT * FROM Persons";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo "<tr><td> " . $row["ID"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["Name"] . "</td><td>" . $row ["Lastname"] . "</td></tr>";

            }


        }

        ?>


    </table>


</div>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>