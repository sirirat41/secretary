<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["purchase_id"] )) {
    $purchaseID = $_POST["purchase_id"];
    $sqlUpdate ="UPDATE supplies_purchase SET status = 1 WHERE id = ". $purchaseID;

    $log = "กู้คืนข้อมูลการจัดซื้อวัสดุสิ้นเปลือง";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_supplies_purchase.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_supplies_purchase.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_supplies_purchase.php?message=ข้อมูลผิดพลาด');
}

?>