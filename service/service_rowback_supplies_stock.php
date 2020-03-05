<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stock_id"])) {
    $stockid = $_POST["stock_id"];
    $sqlUpdate = "UPDATE supplies_stock SET status = 1 WHERE id = " . $stockid;

    $log = "กู้คืนข้อมูลจำนวนคงเหลือวัสดุสิ้นเปลือ";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_supplies_stock.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_supplies_stock.php?message=ลบข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../rowback_supplies_stock.php?message=ลบข้อมูลผิดพลาด');
}

?>