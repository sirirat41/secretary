<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
<<<<<<< HEAD
    mysqli_set_charset($conn, "utf8");
=======
    mysqli_set_charset($conn,"utf8");
>>>>>>> a10740cbb8d541803515a024ea97c908a2ff3c96

?>