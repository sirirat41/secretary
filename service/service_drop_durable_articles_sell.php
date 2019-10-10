<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $productid = $_POST["product_id"];
    $sqlUpdate = "UPDATE durable_articles_sell SET status = 0 WHERE id = " . $productid;

    $log = "ลบข้อมูลการขายทอดตลาดครุภัณฑ์ รหัส " . $productid;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_sell.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_sell.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../display_durable_articles_sell.php?message=ลบข้อมูลผิดพลาด');
    }

?>