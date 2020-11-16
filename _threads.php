<?php
    require "_connect.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $id = $_GET["id"];
        $sql = "SELECT `uid`, `username`, `text`, `time` from `chatbox`";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($res);

        foreach ($data as $textThread) {
            $uid = $textThread[0];
            $name = $textThread[1];
            $msg = $textThread[2];
            $time = $textThread[3];
            
            if($uid != $id){
                echo '<p class="lead">
                <div class="mt-0 alert alert-dark message lmessage" role="alert">
                <span class="ml-1 text-dark username">'.$name.'</span>
                '.$msg.'
                <span class="text-secondary txttime">'.$time.'</span>
                </div>
                </p>';
            }
            else{
                echo '<p class="lead">
                    <div class="alert alert-success message rmessage" role="alert">
                    '.$msg.'
                    <span class="text-secondary txttime">'.$time.'</span>
                    </div>
                </p>';
            }
        }

    }

    else {
        // echo "<script>window.location='.//'</script>;";
        header("Location: ./");
        exit();
    }


?>