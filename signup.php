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
    session_start();
    require "_connect.php";

    if(isset($_SESSION["refresh"])){
        unset($_SESSION["refresh"]);
        echo "<script>window.location='./'</script>";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $susername = strtolower(htmlentities($_POST["susername"]));
        $spassword = htmlentities($_POST["spassword"]);
        $cpassword = htmlentities($_POST["cpassword"]);
        $pass = password_hash($spassword, PASSWORD_DEFAULT);
        $gcode = $_POST["gcode"];

        $reg = "/^[a-zA-Z0-9]+$/";
        if ($gcode != '178596') {
            echo '<div class="jumbotron bg-danger text-warning">
                <h1 class="display-4 over"><b>Failed!</b></h1>
                <p class="lead msg">You have failed to SignedUp. You have entered the wrong gcode.</p>
                <hr class="my-4 bg-warning">
                <p class="lead">
                  <a class="btn btn-outline-warning btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
                exit();
        } 
        else if (!preg_match($reg, $susername)) {
            echo '<div class="jumbotron bg-danger text-warning">
                <h1 class="display-4 over"><b>Failed!</b></h1>
                <p class="lead msg">You have failed to SignedUp. You have entered an invalid username.</p>
                <hr class="my-4 bg-warning">
                <p class="lead">
                  <a class="btn btn-outline-warning btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
                exit();
        }
         else if ($cpassword != $spassword) {
            echo '<div class="jumbotron bg-danger text-warning">
                <h1 class="display-4 over"><b>Failed!</b></h1>
                <p class="lead msg">You have failed to SignedUp. You have entered the unmatching passwords.</p>
                <hr class="my-4 bg-warning">
                <p class="lead">
                  <a class="btn btn-outline-warning btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
                exit();
        } 
        else {
            $sql = "SELECT * FROM `users` WHERE `username`='$susername';";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)) {
                echo '<div class="jumbotron bg-secondary text-dark">
                <h1 class="display-4 over"><b>Sorry!</b></h1>
                <p class="lead msg">The name you chose is already in use by some other user. Kindly choose some other name and try again.</p>
                <hr class="my-4 bg-dark">
                <p class="lead">
                  <a class="btn btn-outline-dark btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
                exit();
            }
            $sql = "INSERT INTO `users` (`username`, `password`, `pwd`) VALUES ('$susername', '$pass', '$spassword');";
            $res = mysqli_query($conn, $sql);
            if($res){
                echo '<div class="jumbotron bg-secondary text-dark">
                <h1 class="display-4 over"><b>Success!</b></h1>
                <p class="lead msg">You have successfully SignedUp. Please go to home page and login to enter the nammaChatroom.</p>
                <hr class="my-4 bg-dark">
                <p class="lead">
                  <a class="btn btn-outline-dark btn-lg shadow-box" href="./" role="button">Login</a>
                </p>
                </div>';
            }
            else{
                echo '<div class="jumbotron bg-danger text-warning">
                <h1 class="display-4 over"><b>Error!</b></h1>
                <p class="lead msg">Sorry the registration was not complete due to server error. Please try after some time .</p>
                <hr class="my-4 bg-dark">
                <p class="lead">
                  <a class="btn btn-outline-warning btn-lg shadow-box" href="./" role="button">Go Back</a>
                </p>
                </div>';
            }
        }
    } 

    else{
        echo "<script>window.location='./'</script>;";
        exit();
    }

    $_SESSION["refresh"] = true;
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>