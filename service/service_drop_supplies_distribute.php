<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['distribute_id'])) {
    $distribute_id = $_POST["distribute_id"];
    $type = $_GET["type"];
    $productID = $_POST["product_id"];
    $sqlUpdate ="UPDATE supplies_distribute SET status = 0 WHERE id = ". $distribute_id;
    mysqli_query($conn, $sqlUpdate) or die("Cannot update distribute_id: " . mysqli_error($conn));
    
    $log = "ยกเลิกข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง รหัส " . $distribute_id;
    logServer($conn, $log);

    $sqlSelect = "SELECT d.*,s.supplies_id ,s.code FROM supplies_distribute as d , supplies as s WHERE s.id = $productID";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
   $number = $dataOld["number"];
   $suppliesid = $dataOld["supplies_id"];

    $sqlUpdate = "UPDATE supplies_stock SET stock = stock + $number WHERE id = $suppliesid";
    mysqli_query($conn, $sqlUpdate);

    $sqlUpdate = "UPDATE supplies SET status = 1";
    $sqlUpdate .= " WHERE id = $productID";
    mysqli_query($conn, $sqlUpdate) or die("Cannot update distribute_id: " . mysqli_error($conn));

        header('Location: ../display_supplies_distribute.php?type='.$type .'&message=ยกเลิกข้อมูลสำเร็จ');
   
}

?>