<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //receive_donate data
    $productid = $_POST["product_id"];
    $buyer = $_POST["buyer"];
    $selldate = $_POST["sell_date"];
    $documentno = $_POST["document_no"];
    $flag = $_POST["flag"];

    $log = "แก้ไขข้อมูลการขายทอดตลาดครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);

    $updatesell = "UPDATE durable_articles_sell SET buyer = '$buyer',";
    $updatesell .= " sell_date = '$selldate', document_no = '$documentno', flag = '$flag' ";
    $updatesell .= " WHERE id = $id";
    mysqli_query($conn, $updatesell) or die("Cannot update sell" . mysqli_error($conn));
    header('Location: ../display_durable_articles_sell.php?message=แก้ไขข้อมูลสำเร็จ');

}
