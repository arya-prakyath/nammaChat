<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $text = htmlentities($_POST["text"]);

        // Take out empty texts
        // $reg = "/\S/";
        if(!$text){
            exit();
        }

        else{
            require "_connect.php";
            
            $uid = $_POST["uid"];
            $time = $_POST["time"];

            $sql = "SELECT `username` from `users` WHERE `userid`='$uid';";
            $res = mysqli_query($conn, $sql);
            $username = mysqli_fetch_assoc($res)["username"];
            
            $sql = "INSERT INTO `chatbox` (`uid`, `username`, `text`, `time`) VALUES ('$uid', '$username', '$text', '$time');";
            $res = mysqli_query($conn, $sql);

            if(!$res){
                echo "error";
                exit();
            }
        }
    }

    else {
        echo "<script>window.location='./'</script>;";
        exit();
    }
?>
