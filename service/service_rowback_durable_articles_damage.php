<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['damage_id'])) {
    $damage_id = $_POST["damage_id"];

    $sqlUpdate = "UPDATE durable_maerial_damage SET status = 1 WHERE id = " . $damage_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_maerial_damage.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_maerial_damage.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../rowback_durable_maerial_damage.php?message=ข้อมูลผิดพลาด');
}
