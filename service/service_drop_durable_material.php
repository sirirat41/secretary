<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['material_id'])) { 
    $materialid = $_POST["material_id"];

    $log = "ยกเลิกข้อมูลวัสดุคงทน";
    logServer($conn, $log);

    $sqlUpdate = "UPDATE durable_material SET status = 0 WHERE id = " .$materialid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material.php?message=ยกเลิกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../display_durable_material.php?message=ข้อมูลผิดพลาด');
}
?>