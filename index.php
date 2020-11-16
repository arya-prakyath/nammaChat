<!doctype html>
<html lang="en">
<?php
        session_start();
        session_unset();
        session_destroy();
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,600&family=Lemonada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time() ?>">

    <title>nammaChat | THE_ARYA</title>
</head>

<body class='bg-dark'>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <img src="favicon.png" alt="" width="30" height="30">
        <a class="navbar-brand ml-1" href="./">nammaChat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <button type="button" class="btn btn-outline-primary m-2" data-toggle="modal" data-target="#login">Login</button>
                <button type="button" class="btn btn-outline-warning m-2" data-toggle="modal" data-target="#signup">Signup</button>
            </div>
        </div>
    </nav>

    <!-- Login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog bg-secondary" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                    <form action="login.php" onsubmit="return logvalidate()" method="post">
                        <div class="form-group text-light">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            <p class="text-warning" id="usermsg"></p>
                        </div>
                        <div class="form-group text-light">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                            <p class="text-warning" id="pwdmsg"></p>
                        </div>
                        <button type="submit" class="form-group btn btn-outline-secondary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog bg-secondary" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLongTitle">Signup Now</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                    <form action="signup.php" onsubmit="return signvalidate()" method="post">
                        <div class="form-group text-light">
                            <label for="susername">Username</label>
                            <input type="text" class="form-control bg" name="susername" id="susername" placeholder="Choose Username">
                            <p class="text-warning" id="susermsg"></p>
                        </div>
                        <div class="form-group text-light">
                            <label for="spassword">Password</label>
                            <input type="password" class="form-control" name="spassword" id="spassword" placeholder="Choose password">
                            <p class="text-warning" id="spwdmsg"></p>
                        </div>
                        <div class="form-group text-light">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm password">
                            <p class="text-warning" id="scpwdmsg"></p>
                        </div>
                        <div class="form-group text-light">
                            <label for="gcode">Gang Code</label>
                            <input type="password" class="form-control" name="gcode" id="gcode" placeholder="gcode">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- carousel -->
    <div class="carousel slide sticky-top" data-ride="carousel" style="z-index:-1;">
        <div class="carousel-inner">
            <div class="carousel-item active"> 
                <!-- 1600x800 -->
                <img class="d-block w-100" src="https://source.unsplash.com/100x50/?phone" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/100x50/?internet" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/100x50/?gang,friends,friendship" alt="Third slide">
            </div>
            <div class="carousel-item"> 
                <!-- 1600x800 -->
                <img class="d-block w-100" src="https://source.unsplash.com/100x50/?message,connect" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/100x50/?bubble,phone" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/100x50/?gang,friends,friendship" alt="Third slide">
            </div>
        </div>
    </div>

    <div class="jumbotron text-light bg-dark mt-1" id="jumbo" style="z-index:1;">
        <h1 class="display-5">Welcome to nammaChat</h1>
        <p class="lead mt-5">This is a simple and very well secured online chat app. Just join and chat for free over the internet.</p>
        <hr class="my-4 bg-secondary">
        <p class="lead">
            <a class="btn btn-outline-secondary btn-lg" href="#" role="button" data-toggle="modal" data-target="#signup">Get Started</a>
        </p>
    </div>


    <script src="script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        // Carousel Jquery
        $('.carousel').carousel({
            interval: 2500,
            pause: false
         })
    </script>

</body>
</html>