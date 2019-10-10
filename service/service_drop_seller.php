<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seller_id"])) {
    $sellerid = $_POST["seller_id"];

    $log = "ลบข้อมูลร้านค้า รหัส " . $seller_id;
    logServer($conn, $log);
    
    $sqlUpdate ="UPDATE seller SET status = 0 WHERE id = " .$sellerid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_seller.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_seller.php?message=ลบข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_seller.php?message=ลบข้อมูลผิดพลาด');
}

?>