<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["purchase_id"] )) {
    $purchaseID = $_POST["purchase_id"];
    $sqlUpdate ="UPDATE durable_material_purchase SET status = 1 WHERE id = ". $purchaseID;


    $log = "กู้คืนข้อมูลการจัดซื้อวัสดุคงทน";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material_purchase.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_material_purchase.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_durable_material_purchase.php?message=ข้อมูลผิดพลาด');
}

?>