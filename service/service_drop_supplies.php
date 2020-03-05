<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supplies_id"])) {
    $suppliesid = $_POST["supplies_id"];
    $sqlUpdate = "UPDATE supplies SET status = 0 WHERE id = " . $suppliesid;

    $log = "ยกเลิกข้อมูลวัสดุสิ้นเปลือง";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_supplies.php?message=ยกเลิกข้อมูลผิดพลาด');
}

?>