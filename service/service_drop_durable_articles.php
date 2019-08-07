<?php
require "connection.php";

<<<<<<< HEAD
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["article_id"] )) {
    $articlesID = $_POST["article_id"];
    $sqlUpdate ="UPDATE durable_articles SET status = 0 WHERE id = ". $articlesID;

=======
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["articles_id"])) {
    $articlesid = $_POST["articles_id"];
    $sqlUpdate = "UPDATE durable_articles SET status = 0 WHERE id = " . $articlesid;
>>>>>>> 44df56d8c671330eec13bfc30b13025a1514cd64
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลไม่สำเร็จ');
    }
<<<<<<< HEAD

=======
>>>>>>> 44df56d8c671330eec13bfc30b13025a1514cd64
} else {
    header('Location: ../display_durable_articles.php?message=ลบข้อมูลผิดพลาด');
}

?>