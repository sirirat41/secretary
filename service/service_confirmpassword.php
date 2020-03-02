<?php
session_start();
$_SESSION["user_type"] = "99";
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];
 
    $password =  md5($_POST["password1"]);
    $updatepassword = "UPDATE user SET password = '$password' ";
    $updatepassword .= " WHERE id = $id";
  
    mysqli_query($conn, $updatepassword) or die("Cannot update password". mysqli_error($conn));
    header('location: ./../index.php');
}
session_destroy();
