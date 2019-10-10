<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['damage_id'])) {
    $damage_id = $_POST["damage_id"];

    $log = "กู้คืนข้อมูลการชำรุดวัสดุคงทน รหัส " . $damage_id ;
    logServer($conn, $log);


    $sqlUpdate = "UPDATE durable_material_damage SET status = 1 WHERE id = " . $damage_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material_damage.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_material_damage.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../rowback_durable_material_damage.php?message=ข้อมูลผิดพลาด');
}
