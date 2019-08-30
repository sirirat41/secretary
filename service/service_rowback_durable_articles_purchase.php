<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["purchase_id"] )) {
    $purchaseID = $_POST["purchase_id"];
    $sqlUpdate ="UPDATE durable_articles_purchase SET status = 1 WHERE id = ". $purchaseID;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_purchase.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_purchase.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_durable_articles_purchase.php?message=ข้อมูลผิดพลาด');
}

?>