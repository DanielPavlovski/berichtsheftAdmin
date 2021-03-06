<?php
session_start();
?><!doctype html>
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
    <?php
    if ($_GET['error']) {
        switch($_GET['errorCode']){
            case '401':
                $erroText="Login Data not Found!";
                break;
            default:
                $erroText="Error";
                break;
        }
        echo "<div class='alert alert-warning'>" . $erroText . "</div>";
    }
    ?>
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <div class="login_form">
                <h1 id="login_name">Login</h1>
                <form method="POST" action="login.php">
                    <input type="text" name="u" placeholder="Username" required="required" class="form-control"/>
                    <input type="password" name="p" placeholder="Password" required="required" class="form-control"/>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Sign in</button>
                </form>
            </div>
        </div>
        <div class="col-sm">
        </div>
    </div>
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