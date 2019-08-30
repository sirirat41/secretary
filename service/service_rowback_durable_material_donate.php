<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['donate_id'])) {
    $donate_id = $_POST["donate_id"];

    $sqlUpdate = "UPDATE durable_material_donate SET status = 1 WHERE id = " . $donate_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material_donate.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ..rowback_durable_material_donate.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../rowback_durable_material_donate.php?message=ข้อมูลผิดพลาด');
}
