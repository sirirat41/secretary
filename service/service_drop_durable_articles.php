<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["articles_id"])) {
    $articlesid = $_POST["articles_id"];
    $sqlUpdate = "UPDATE durable_articles SET status = 0 WHERE id = " . $articlesid;

    $log = "ยกเลิกข้อมูลครุภัณฑ์";
    logServer($conn, $log);
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles.php?message=ยกเลิกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../display_durable_articles.php?message=ข้อมูลผิดพลาด');
}
