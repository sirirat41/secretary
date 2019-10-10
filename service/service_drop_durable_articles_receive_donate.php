<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["receive_donate_id"])) {
    $receive_donate_id = $_POST["receive_donate_id"];
    $sqlUpdate = "UPDATE durable_articles_receive_donate SET status = 0 WHERE id = " . $receive_donate_id;

    $log = "ลบข้อมูลการรับบริจาคครุภัณฑ์ รหัส " . $receive_donate_id;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_receive_donate.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_receive_donate.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../display_durable_articles_receive_donate.php?message=ลบข้อมูลผิดพลาด');
    }

?>