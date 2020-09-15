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
    <script src="https://kit.fontawesome.com/abbbcfcd25.js" crossorigin="anonymous"></script>
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


            <button type="submit" value="" name="create" class="btn  btn-primary create_button bg-danger"
                    title="create new user"><i class="fas fa-plus"></i>
            </button>


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

            <th>Firstname</th>
            <th>Lastname</th>

        </tr>
        <?php

        $conn = createConnection();
        $query = "SELECT * FROM User";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>

                <form action="" method="post" role="form">
                <tr>

                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Lastname']; ?></td>


                    <td><input type="checkbox" class="" name="key_to_delete" value="<?php echo $row['ID']; ?>" required>
                    </td>

                    <td class="action_buttons">





                            <button type="submit" name="edit_button" title="edit selected user" value="edit"
                                    class="btn  btn-primary bg-warning">
                                <i class="fas fa-user-edit"></i>
                            </button>


                            <button type="submit" name="delete_button" value="delete"
                                    class="btn  btn-primary  bg-danger"
                                    title="delete selected user"><i class="fas fa-trash-alt"></i></button>


                        </form>
                    </td>




                </tr>


                <?php
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

