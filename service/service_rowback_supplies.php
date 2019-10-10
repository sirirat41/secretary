<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supplies_id"])) {
    $suppliesid = $_POST["supplies_id"];
    $sqlUpdate = "UPDATE supplies SET status = 1 WHERE id = " . $suppliesid;

    $log = "กู้คืนข้อมูลวัสดุสิ้นเปลือง รหัส " . $suppliesid ;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_supplies.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_supplies.php?message=ลบข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../rowback_supplies.php?message=ลบข้อมูลผิดพลาด');
}

?>