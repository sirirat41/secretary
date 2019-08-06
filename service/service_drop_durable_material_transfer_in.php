<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_in_id"] )) {
    $permitsID = $_POST["transfer_in_id"];
    $sqlUpdate ="UPDATE durable_material_transfer_in SET status = 0 WHERE id = ". $permitsID;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material_transfer_in.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_transfer_in.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_material_transfer_in.php?message=ข้อมูลผิดพลาด');
}

?>