<?php
require 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET["id"];

    //damage data
    $productId = $_POST["product_id"];
    $damage_date = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $log = "แก้ไขข้อมูลการชำรุดครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);

    $updateDamage = "UPDATE durable_articles_damage SET damage_date = '$damage_date',";
    $updateDamage .= " flag = '$flag'";
    $updateDamage .= " WHERE id = $id";

    mysqli_query($conn, $updateDamage) or die("Cannot update damage: ". mysqli_error($conn));
    header('Location: ../display_durable_articles_damage.php?message=แก้ไขข้อมูลสำเร็จ');
}
