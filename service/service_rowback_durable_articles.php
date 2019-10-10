<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["articles_id"])) {
    $articlesid = $_POST["articles_id"];
    $sqlUpdate = "UPDATE durable_articles SET status = 1 WHERE id = " . $articlesid;

    $log = "กู้คืนข้อมูลครุภัณฑ์ รหัส " . $articlesid ;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../rowback_durable_articles.php?message=ข้อมูลผิดพลาด');
}
