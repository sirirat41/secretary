<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['damage_id'])) {
    $damage_id = $_POST["damage_id"];
    $productid = $_POST["product_id"];
    $log = "ยกเลิกข้อมูลการชำรุดวัสดุคงทน";
    logServer($conn, $log);

    $sqlUpdate = "UPDATE durable_material_damage SET status = 0 WHERE id = " . $damage_id;
    mysqli_query($conn, $sqlUpdate) or die("Cannot update donate_id: " . mysqli_error($conn));

        $sqlUpdate ="UPDATE durable_material SET status = 1 WHERE id = $productid";
       
        mysqli_query($conn, $sqlUpdate) or die("Cannot update donate_id: " . mysqli_error($conn));

    header('Location: ../display_durable_material_damage.php?message=ยกเลิกข้อมูลสำเร็จ');
}
