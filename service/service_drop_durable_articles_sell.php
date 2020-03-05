<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sell_id"])) {
    $sell = $_POST["sell_id"];
    $productid = $_POST["product_id"];
    $sqlUpdate = "UPDATE durable_articles_sell SET status = 0 WHERE id = " . $sell;

    $log = "ยกเลิกข้อมูลการขายทอดตลาดครุภัณฑ์";
    logServer($conn, $log);

    mysqli_query($conn, $sqlUpdate) or die("Cannot update product_id: " . mysqli_error($conn));

    $sqlUpdate = "UPDATE durable_articles SET status = 1";
    $sqlUpdate .= " WHERE id = $productid";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update product_id: " . mysqli_error($conn));

    header('Location: ../display_durable_articles_sell.php?message=ยกเลิกข้อมูลสำเร็จ');
}
