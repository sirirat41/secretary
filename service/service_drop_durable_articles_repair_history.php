<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $sqlUpdate = "UPDATE durable_articles_repair_history SET status = 0 WHERE id = " . $repairid;

    $log = "ลบข้อมูลประวัติการซ่อมครุภัณฑ์ รหัส " . $repairid;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_repair_history.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_repair_history.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../display_durable_articles_repair_history.php?message=ลบข้อมูลผิดพลาด');
    }

?>