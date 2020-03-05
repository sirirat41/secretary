<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['donate_id'])) {
    $donate_id = $_POST["donate_id"];
    $productid = $_POST["product_id"];

    $log = "ยกเลิกข้อมูลการบริจาคครุภัณฑ์";
    logServer($conn, $log);

    $sqlUpdate = "UPDATE durable_articles_donate SET status = 0 WHERE id = " . $donate_id;
    mysqli_query($conn, $sqlUpdate) or die("Cannot update donate_id: " . mysqli_error($conn));

    $sqlUpdate = "UPDATE durable_articles SET status = 1";
    $sqlUpdate .= " WHERE id = $productid";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update donate_id: " . mysqli_error($conn));

    header('Location: ../display_durable_articles_donate.php?message=ยกเลิกข้อมูลสำเร็จ');
}
