<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $sqlUpdate = "UPDATE durable_articles_repair SET status = 0 WHERE id = " . $repairid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_repair.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_repair.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../display_durable_articles_repair.php?message=ลบข้อมูลผิดพลาด');
    }

?>