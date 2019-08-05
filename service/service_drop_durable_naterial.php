<?php
require "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['material_id'])) { 
    $materials_id = $_POST["material_id"];

    $sqlUpdate = "UPDATE durable_material SET status = 0 WHERE id = " .$material_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../display_durable_material.php?message=เพิ่มข้อมูลผิดพลาด');
}
?>