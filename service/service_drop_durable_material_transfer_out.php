<?php
require "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_in_out"] )) {
    $transfer_inID = $_POST["transfer_in_out"];
    $productid = $_POST["product_id"];
    $sqlUpdate ="UPDATE durable_material_transfer_out SET status = 0 WHERE id = ". $transfer_inID;

    $log = "ยกเลิกข้อมูลการโอนเข้าครุภัณฑ์";
    logServer($conn, $log);

    mysqli_query($conn, $sqlUpdate) or die("Cannot update transfer_out_id: " . mysqli_error($conn));

    $sqlUpdate = "UPDATE durable_material SET status = 1";
    $sqlUpdate .= " WHERE id = $productid";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update transfer_out_id: " . mysqli_error($conn));

    header('Location: ../display_durable_articles_transfer_out.php?message=ยกเลิกข้อมูลสำเร็จ');
}
