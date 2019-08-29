<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"] )) {
    $id = $_POST["id"];

    $sqlUpdate ="UPDATE department SET status = 0 WHERE id = " .$id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_department.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_department.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_department.php?message=ข้อมูลผิดพลาด');
}

?>