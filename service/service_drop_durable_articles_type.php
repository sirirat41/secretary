<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type_id"] )) {
    $typeID = $_POST["type_id"];
    $sqlUpdate ="UPDATE durable_articles_type SET status = 0 WHERE id = ". $typeID;

    $log = "ยกเลิกข้อมูลประเภทครุภัณฑ์";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_type.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_type.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_articles_type.php?message=ข้อมูลผิดพลาด');
}

?>