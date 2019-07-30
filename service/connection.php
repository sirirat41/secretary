<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

<<<<<<< HEAD
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
=======
    $conn = mysqli_connect($servername,$username,$password,$database);
    if (!$conn) {
        die("Failed to connect to MySQL;" . mysqli_connect_error());
    }

>>>>>>> 945b4252c50b37d7395e101b99fb2adccbcaa8e2
?>