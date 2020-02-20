<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["unit_id"] )) {
    $unit_id = $_POST["unit_id"];
    $sqlUpdate ="UPDATE unit SET status = 1 WHERE id = " .$unit_id;

    $log = "กู้คืนข้อมูลหน่วยนับ รหัส " . $unit_id ;
    logServer($conn, $log);

    
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_unit.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_unit.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_unit.php?message=ข้อมูลผิดพลาด');
}

?>