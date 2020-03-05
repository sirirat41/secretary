<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["department_id"] )) {
    $department_id = $_POST["department_id"];

    $log = "ยกเลิกข้อมูลหน่วยงาน";
    logServer($conn, $log);

    $sqlUpdate ="UPDATE department SET status = 0 WHERE id = " .$department_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_department.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_department.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_department.php?message=ข้อมูลผิดพลาด');
}

?>