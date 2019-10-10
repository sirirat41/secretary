<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['donate_id'])) {
    $donate_id = $_POST["donate_id"];

    $log = "ลบข้อมูลการบริจาคครุภัณฑ์ รหัส " . $donate_id;
    logServer($conn, $log);

    $sqlUpdate = "UPDATE durable_articles_donate SET status = 0 WHERE id = " . $donate_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_donate.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_donate.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../display_durable_articles_donate.php?message=ข้อมูลผิดพลาด');
}
