<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stock_id"] )) {
    $stockID = $_POST["stock_id"];
    
    $sqlUpdate ="UPDATE supplies_stock SET status = 0 WHERE id = ". $stockID;

    $log = "ยกเลิกข้อมูลจำนวนคงเหลือวัสดุสิ้นเปลือง";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies_stock.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies_stock.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_supplies_stock.php?message=ข้อมูลผิดพลาด');
}

?>