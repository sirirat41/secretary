<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type_id"] )) {
    $typeID = $_POST["type_id"];
    $sqlUpdate ="UPDATE durable_material_type SET status = 1 WHERE id = ". $typeID;

    $log = "กู้คืนข้อมูลประเภทวัสดุคงทน รหัส " . $typeID ;
    logServer($conn, $log);


    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material_type.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_type.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_material_type.php?message=กู้ข้อมูลผิดพลาด');
}

?>