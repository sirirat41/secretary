<?php
require 'connection.php';
if(isset($_POST["password1"])) {
    $id = $_SESSION["user_id"];
    $password = md5($_POST["password1"]);
    $sql = "UPDATE user SET password = '$password'";
    $sql .= " WHERE id = $id"; 


    mysqli_query($conn, $sql) or die("Cannot update password". mysqli_error($conn));
    header('location: service_logout.php');
}