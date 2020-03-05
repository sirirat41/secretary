<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_out_id"] )) {
    $transfer_outID = $_POST["transfer_out_id"];
    $sqlUpdate ="UPDATE durable_articles_transfer_out SET status = 1 WHERE id = ". $transfer_outID;

    $log = "กู้คืนข้อมูลการโอนออกครุภัณฑ์";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_transfer_out.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_transfer_out.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_durable_articles_transfer_out.php?message=กู้ข้อมูลผิดพลาด');
}

?>