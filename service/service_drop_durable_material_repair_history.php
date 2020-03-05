<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $sqlUpdate = "UPDATE durable_material_repair_history SET status = 0 WHERE id = " . $repairid;

    $log = "ยกเลิกข้อมูลประวัติการซ่อมวัสดุคงทน";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material_repair_history.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_repair_history.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../display_durable_material_repair_history.php?message=ยกเลิกข้อมูลผิดพลาด');
    }

?>