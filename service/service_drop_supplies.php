<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supplies_id"])) {
    $suppliesid = $_POST["supplies_id"];
    $sqlUpdate = "UPDATE supplies SET status = 0 WHERE id = " . $suppliesid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies.php?message=ลบข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_supplies.php?message=ลบข้อมูลผิดพลาด');
}

?>