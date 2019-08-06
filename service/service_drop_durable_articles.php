<?php
require "connection.php";
<<<<<<< HEAD
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
=======
<<<<<<< HEAD

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["article_id"] )) {
    $articlesID = $_POST["article_id"];
    $sqlUpdate ="UPDATE durable_articles SET status = 0 WHERE id = ". $articlesID;

=======
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["articles_id"])) {
    $articlesid = $_POST["articles_id"];
    $sqlUpdate = "UPDATE durable_articles SET status = 0 WHERE id = " . $articlesid;
>>>>>>> 04250eaf9494e64a953ee7e422388668716fbf46
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles.php?message=ลบข้อมูลไม่สำเร็จ');
    }
<<<<<<< HEAD

} else {
    header('Location: ../display_durable_articles.php?message=ข้อมูลผิดพลาด');
}

=======
} else {
    header('Location: ../display_durable_articles.php?message=ลบข้อมูลผิดพลาด');
}
>>>>>>> 04250eaf9494e64a953ee7e422388668716fbf46
>>>>>>> 78445379073fb397e53abfe2356bd0040b8bfdac
?>