<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["permits_id"] )) {
    $permitsID = $_POST["permits_id"];
    $sqlUpdate ="UPDATE durable_articles_permits SET status = 0 WHERE id = ". $permitsID;

    $log = "ลบข้อมูลการยืม-คืนครุภัณฑ์ รหัส " . $permitsID;
    logServer($conn, $log);

    
    $sqlUpdate = "UPDATE durable_articles SET status = 1";
    $sqlUpdate .= " WHERE id = $permitsID";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update damage: " . mysqli_error($conn));

        header('Location: ../display_durable_articles_permits.php?message=ลบข้อมูลสำเร็จ');
   
}

?>