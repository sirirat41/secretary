<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

?>