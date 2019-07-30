<?php
    $servername ="localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

<<<<<<< HEAD
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
=======
    $conn = mysqli_connect ($servername ,$username ,$password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());

    }


>>>>>>> 4cd26ec3f06c16ff696e20aaff1da0d7543e807a
?>