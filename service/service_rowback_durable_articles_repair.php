<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
<<<<<<< HEAD
    $sqlUpdate = "UPDATE durable_articles_repair SET status = 0 WHERE id = " . $repairid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_repair.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_repair.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../rowback_durable_articles_repair.php?message=กู้ข้อมูลผิดพลาด');
=======
    $sqlUpdate = "UPDATE durable_articles_repair SET status = 1 WHERE id = " . $repairid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_repair.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_repair.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../rowback_durable_articles_repair.php?message=ลบข้อมูลผิดพลาด');
>>>>>>> b8819126e94570ec4a51c980fe4e3306830fd785
    }

?>