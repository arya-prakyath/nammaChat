<?php
    session_start();
    if (!isset($_SESSION["logged"]) or $_SESSION["logged"]!==$_GET["uid"]) {
        echo "<script>window.location='./'</script>;";
        exit();
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,600&family=Lemonada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time() ?>">

    <title>nammaChat | chatRoom</title>
</head>

<body class='bg-dark'>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="favicon.png" alt="" width="30" height="30">
        <a class="navbar-brand ml-1" href="./">nammaChat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="./"><button type="button" class="btn btn-outline-primary m-2">Logout</button></a>
            </div>
            <div class="navbar-nav">
               <a><button type="button" class="btn btn-outline-primary m-2" id="fsBtn">Full screen</button></a>
            </div>
        </div>
    </nav>
    <hr class="bg-secondary m-0">

    <?php
    require '_connect.php';
    $userid = $_GET["uid"];

    echo '<script>var id = '.$userid.'</script>';

    echo '<div class="mt-3">
            <div class="jumbotron p-2 bg-secondary" id="chatbox">
                <div class="container">';
    ?>

    <!-- ASYNC GET FROM _THREADS WITH ID  -->
                <div id="async"></div>
                </div>
            </div>
          </div>
    <div class="bg-light" id="inpmsgdiv">
        <textarea class="form-control form-control-lg m-auto bg-light text-dark" id="inpmsg" rows="1" placeholder="Type a message ..."></textarea>
        <button class="btn bg-light" ><img src="send.png" id="send" alt="SEND"></button>
    </div>

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

        function loadThreads(id) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", `_threads.php?id=${id}`, true);
            
            xhr.onload = function () {
                if((this.status === 200) && (this.readyState === 4)){
                    document.getElementById("async").innerHTML = this.responseText;
                }
            }
            
            xhr.send();
        }
        loadThreads(id);
        setTimeout(() => {
            document.getElementById("chatbox").scrollTo(0,document.getElementById("chatbox").scrollHeight);
        }, 505);
        setInterval(() => {
            loadThreads(id);
        }, 500);


        function updateThread() {
            let msg = document.getElementById("inpmsg").value;
            document.getElementById("inpmsg").value = '';
            document.getElementById("inpmsg").innerHTML = '';
            let day = new Date();
            let time = day.getDate() + '-' + day.getMonth() + '-' +day.getFullYear() + '|' + day.getHours() + ':' + day.getMinutes();
            const xhr = new XMLHttpRequest();
            xhr.open("POST", `_threadUpdate.php`, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            let urlParam = `text=${msg}&uid=${id}&time=${time}`;
            xhr.send(urlParam);
            xhr.onload = function () {
                if((this.status === 200) && (this.readyState === 4)){
                    if(this.responseText){
                        alert('Message was not sent due to some error!');
                    }
                    setTimeout(() => {
                        document.getElementById("chatbox").scrollTo(0,document.getElementById("chatbox").scrollHeight);
                    }, 505);
                }
            }
        }

        window.onkeypress = function(event){
            if(event.key == "Enter"){
                let msg = document.getElementById("inpmsg");
                updateThread();   
            }
        }

        let send = document.getElementById("send");
        send.addEventListener('click', updateThread);

        document.getElementById("inpmsg").addEventListener('keypress', (e)=>{
            if(e.key == "Enter")
                e.preventDefault();
        })

        document.getElementById("fsBtn").addEventListener("click", fullScreen);
        function fullScreen() {
            fsBtn = document.getElementById("fsBtn");
            if(fsBtn.innerText == "Full screen"){
                document.documentElement.requestFullscreen();
                fsBtn.innerText = "Exit full screen";
                return;
            }
            else{
                document.exitFullscreen();
                fsBtn.innerText = "Full Screen";
                return;
            }
        }
    </script>
</body>
</html>