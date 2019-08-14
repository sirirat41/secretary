<?php
require "connection.php";

<<<<<<< HEAD
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["articles_id"])) {
    $articlesid = $_POST["articles_id"];
    $sqlUpdate = "UPDATE durable_articles SET status = 0 WHERE id = " . $articlesid;
=======
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['articles_id'])) { 
    $articles_id = $_POST["articles_id"];

    $sqlUpdate = "UPDATE durable_articles SET status = 0 WHERE id = " .$articles_id;
>>>>>>> a53dc21667a15d81f2cf8c98a38c49affbb9957c
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../display_durable_articles.php?message=ข้อมูลผิดพลาด');
}
