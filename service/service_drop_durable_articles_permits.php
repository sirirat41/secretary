<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["permits_id"] )) {
    $permitsID = $_POST["permits_id"];
    $productID = $_POST["product_id"];
    $sqlUpdate ="UPDATE durable_articles_permits SET status = 0 WHERE id = ". $permitsID;
    mysqli_query($conn, $sqlUpdate) or die("Cannot update permits_id: " . mysqli_error($conn));
    $log = "ยกเลิกข้อมูลการยืม-คืนครุภัณฑ์";
    logServer($conn, $log);

    
    $sqlUpdate = "UPDATE durable_articles SET status = 1";
    $sqlUpdate .= " WHERE id = $productID";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update permits: " . mysqli_error($conn));

        header('Location: ../display_durable_articles_permits.php?message=ยกเลิกข้อมูลสำเร็จ');
   
}

?>