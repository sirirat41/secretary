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

    $log = "เพิ่มข้อมูลผู้ใช้งาน ประเภทผู้ใช้ชื่อ " . $username;
    logServer($conn, $log);

    $sql = "INSERT INTO user(username, password, surname, lastname, tel, position, email, u_type)";
    $sql .= " VALUES('$username', '$password', '$surname', '$lastname', $tel, '$position', '$email', '$utype')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_user.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_user.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>