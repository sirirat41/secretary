<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "secretary";

<<<<<<< HEAD



=======
>>>>>>> 9bcf1d5d48433f315200494e957042898478a7c6
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

?>