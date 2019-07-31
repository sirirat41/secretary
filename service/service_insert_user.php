<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $surname = $_POST["surname"];
    $lastname = $_POST["lastname"];
    $tel = $_POST["tel"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $utype = $_POST["u_type"];
    $status = $_POST["status"];

    $sql = "INSERT INTO user(username, password, surname, lastname, tel, position, email, u_type, status)";
    $sql .= " VALUES('$username', '$password', '$surname', '$lastname', '$tel', '$position', '$email', $utype, $status)";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>