<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["product_id"];
    $damagedate = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_articles_damage(product_id ,damage_date ,flag)";
    $sql .= " VALUES($productid ,'$damagedate' ,'$flag')";

    $log = "เพิ่มข้อมูลการชำรุดครุภัณฑ์";
    logServer($conn, $log);
    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_articles_damage.php?message=เพิ่มข้อมูลสำเร็จ');
        $sqlUpdate ="UPDATE durable_articles SET status = 3 WHERE id = $productid";
        mysqli_query($conn ,$sqlUpdate);
    } else {
        echo "Can't insert data, please check this:" . mysqli_error($conn);
    }

} else {


}
header('Location: ../display_durable_articles_damage.php?message=เพิ่มข้อมูลสำเร็จ');

?>