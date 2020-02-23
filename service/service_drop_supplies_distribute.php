<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['distribute_id'])) {
    $id = $_POST["id"];
    $distribute_id = $_POST["distribute_id"];
    $type = $_GET["type"];
    
    $log = "ลบข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง รหัส " . $distribute_id;
    logServer($conn, $log);
    $sqlUpdate = "UPDATE supplies_distribute SET status = 0 WHERE id = " . $distribute_id;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies_distribute.php?type='.$type.'message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies_distribute.php?type='.$type.'&message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../display_supplies_distribute.php?message=ข้อมูลผิดพลาด');
}
