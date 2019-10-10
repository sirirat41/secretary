<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["permits_id"] )) {
    $permitsID = $_POST["permits_id"];
    $sqlUpdate ="UPDATE durable_material_permits SET status = 1 WHERE id = ". $permitsID;

    $log = "กู้คืนข้อมูลการยืม-คืนวัสดุคงทน รหัส " . $permitsID ;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material_permits.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_material_permits.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_durable_material_permits.php?message=กู้ข้อมูลผิดพลาด');
}

?>