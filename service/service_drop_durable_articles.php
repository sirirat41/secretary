<?php
require "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['articles_id'])) { 
    $articles_id = $_POST["articles_id"];

    $sqlUpdate = "UPDATE durable_articles SET status = 0 WHERE id = " .$articles_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../display_durable_articles.php?message=เพิ่มข้อมูลผิดพลาด');
}
?>