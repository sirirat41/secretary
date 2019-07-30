<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
=======
    $conn = mysqli_connect ($servername ,$username ,$password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
>>>>>>> 07fa5f891a0e02cdb8571166c9159e6293425ef6
=======
>>>>>>> 97a7e3a92a8500893cf32d867123fe30cd5db842
    $conn = mysqli_connect($servername,$username,$password,$database);
    if (!$conn) {
        die("Failed to connect to MySQL;" . mysqli_connect_error());
    }

>>>>>>> 945b4252c50b37d7395e101b99fb2adccbcaa8e2
?>