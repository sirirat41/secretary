<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $productid = $_POST["product_id"];

    $sqlUpdate = "UPDATE durable_material_repair SET status = 0 WHERE id = " . $repairid;
    mysqli_query($conn, $sqlUpdate) or die("Cannot update repair_id: " . mysqli_error($conn));
    $log = "ยกเลิกข้อมูลการซ่อมวัสดุคงทน";
    logServer($conn, $log);

    
    $sqlUpdate = "UPDATE durable_material SET status = 3";
    $sqlUpdate .= " WHERE id = $productid";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update permits: " . mysqli_error($conn));

        header('Location: ../display_durable_articles_repair.php?message=ยกเลิกข้อมูลสำเร็จ');
   
}

?>