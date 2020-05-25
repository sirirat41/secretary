<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $surname = $_POST["surname"];
    $lastname = $_POST["lastname"];
    $tel = $_POST["tel"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    // $utype = $_POST["u_type"];
    $updateuser = "UPDATE user SET username = '$username',";
    $updateuser .= " surname = '$surname', lastname = '$lastname', tel = '$tel', position = '$position', email = '$email' ";
    $updateuser .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลผู้ใช้งาน ประเภทผู้ใช้ชื่อ " . $username ;
    logServer($conn, $log);

    mysqli_query($conn, $updateuser) or die("Cannot update user". mysqli_error($conn));
    header('Location: ../display_user.php?message=แก้ไขข้อมูลสำเร็จ');
}
