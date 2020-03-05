<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["receive_donate_id"])) {
    $receive_donate_id = $_POST["receive_donate_id"];
    $productid = $_POST["product_id"];

    $sqlUpdate = "UPDATE durable_material_receive_donate SET status = 0 WHERE id = " . $receive_donate_id;

    $log = "ยกเลิกข้อมูลการรับบริจาควัสดุคงทน";
    logServer($conn, $log);
    mysqli_query($conn, $sqlUpdate) or die("Cannot update donate_id: " . mysqli_error($conn));

    $sqlUpdate = "UPDATE durable_material SET status = 1";
    $sqlUpdate .= " WHERE id = $productid";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update donate_id: " . mysqli_error($conn));

    header('Location: ../display_durable_material_receive_donate.php?message=ยกเลิกข้อมูลสำเร็จ');
}
