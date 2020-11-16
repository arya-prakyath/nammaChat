<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "nammachat";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
        die("Server error");
    }

?>