<?php
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,600&family=Lemonada&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css?v=<?php echo time() ?>">
    <title>nammaChat | Signup</title>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a href="./"><img src="favicon.png" alt="" width="30" height="30"></a>
        <a class="navbar-brand ml-1" href="./">nammaChat</a>
    </nav>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        require "_connect.php";
        $username = strtolower(htmlentities($_POST["username"]));
        $password = htmlentities($_POST["password"]);

        $sql = "SELECT * FROM `users` WHERE `username`='$username'";
        $res = mysqli_query($conn, $sql);

        if (!mysqli_num_rows($res)) {
            echo '<div class="jumbotron bg-danger text-warning">
                <h1 class="display-4 over"><b>Login Failed!</b></h1>
                <p class="lead msg">User not found.</p>
                <hr class="my-4 bg-warning">
                <p class="lead">
                <a class="btn btn-outline-warning btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
            exit();
        }

        $sql = "SELECT `password`,`userid` FROM `users` WHERE `username`='$username';";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($res);
        $hashcode = $data["password"];
        $userid = $data["userid"];
        $hashedpassword = password_verify($password, $hashcode);

        if ($hashedpassword == 0) {
            echo '<div class="jumbotron bg-danger text-warning">
                <h1 class="display-4 over"><b>Login Failed!</b></h1>
                <p class="lead msg">You have entered wrong password.</p>
                <hr class="my-4 bg-warning">
                <p class="lead">
                  <a class="btn btn-outline-warning btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
            exit();
        }

        if ($hashedpassword == 1) {
            $_SESSION["logged"] = $userid;
            echo "<script>window.location='room.php?uid=" .$userid. "';</script>;";
            exit();
        } 
        else {
            echo "<script>window.location='./'</script>;";
            exit();
        }
    } 
    
    else {
        echo "<script>window.location='./'</script>;";
        exit();
    }

    ?>