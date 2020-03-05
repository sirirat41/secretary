<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $productid = $_POST["product_id"];
    $sqlUpdate = "UPDATE durable_articles_repair SET status = 0 WHERE id = " . $repairid;

    $log = "ยกเลิกข้อมูลการซ่อมครุภัณฑ์";
    logServer($conn, $log);
    mysqli_query($conn, $sqlUpdate) or die("Cannot update repair_id: " . mysqli_error($conn));

    $sqlUpdate = "UPDATE durable_articles SET status = 3";
    $sqlUpdate .= " WHERE id = $productid";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update repair_id: " . mysqli_error($conn));

    header('Location: ../display_durable_material_repair.php?message=ยกเลิกข้อมูลสำเร็จ');
}
