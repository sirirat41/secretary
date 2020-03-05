<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seller_id"])) {
    $sellerid = $_POST["seller_id"];

    $log = "ยกเลิกข้อมูลร้านค้า";
    logServer($conn, $log);
    
    $sqlUpdate ="UPDATE seller SET status = 0 WHERE id = " .$sellerid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_seller.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_seller.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_seller.php?message=ยกเลิกข้อมูลผิดพลาด');
}

?>