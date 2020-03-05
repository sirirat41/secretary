<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"] )) {
    $userID = $_POST["user_id"];
    $sqlUpdate ="UPDATE user SET status = 1 WHERE id = ". $userID;

    $log = "กู้คืนข้อมูลผู้ใช้งาน";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_user.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_user.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_user.php?message=ข้อมูลผิดพลาด');
}

?>