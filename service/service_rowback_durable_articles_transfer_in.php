<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_in_id"] )) {
    $transfer_inID = $_POST["transfer_in_id"];
    $sqlUpdate ="UPDATE durable_articles_transfer_in SET status = 1 WHERE id = ". $transfer_inID;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_transfer_in.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_transfer_in.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_durable_articles_transfer_in.php?message=กู้ข้อมูลผิดพลาด');
}