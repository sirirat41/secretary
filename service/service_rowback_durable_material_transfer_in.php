<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_in_id"] )) {
    $transfer_inID = $_POST["transfer_in_id"];
    $sqlUpdate ="UPDATE durable_material_transfer_in SET status = 1 WHERE id = ". $transfer_inID;

    $log = "กู้คืนข้อมูลการโอนเข้าวัสดุคงทน รหัส " . $transfer_inID ;
    logServer($conn, $log);


    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material_transfer_in.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_material_transfer_in.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_durable_material_transfer_in.php?message=ข้อมูลผิดพลาด');
}