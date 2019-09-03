<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"] )) {
    $userID = $_POST["user_id"];
    $sqlUpdate ="UPDATE user SET status = 0 WHERE id = ". $userID;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_user.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_user.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_user.php?message=ข้อมูลผิดพลาด');
}

?>