<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["article_id"] )) {
    $articlesID = $_POST["article_id"];
    $sqlUpdate ="UPDATE durable_articles SET status = 0 WHERE id = ". $articlesID;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_articles.php?message=ลบข้อมูลผิดพลาด');
}

?>