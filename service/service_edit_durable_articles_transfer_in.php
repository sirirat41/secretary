<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $product_id = $_POST["product_id"];
    $document_no = $_POST["document_no"];
    $transfer_date = $_POST["transfer_date"];
    $transfer_from = $_POST["transfer_from"];
    $flag = $_POST["flag"];
    $updatepermit = "UPDATE durable_articles_transfer_in SET document_no = '$document_no',";
    $updatepermit .= "  transfer_date = '$transfer_date', transfer_from = '$transfer_from', flag = '$flag'";
    $updatepermit .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลการโอนเข้าครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);

    mysqli_query($conn, $updatepermit) or die("Cannot update transfer_in". mysqli_error($conn));
    header('Location: ../display_durable_articles_transfer_in.php?message=แก้ไขข้อมูลสำเร็จ');
}
