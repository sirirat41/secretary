<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_in_id"] )) {
    $transfer_inID = $_POST["transfer_in_id"];
    $sqlUpdate ="UPDATE durable_articles_transfer_in SET status = 0 WHERE id = ". $transfer_inID;

    $log = "ลบข้อมูลการโอนเข้าครุภัณฑ์ รหัส " . $transfer_inID;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_transfer_in.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_transfer_in.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_articles_transfer_in.php?message=ข้อมูลผิดพลาด');
}

?>