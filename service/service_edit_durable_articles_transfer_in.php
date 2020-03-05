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
       
    $sqlSelect = "SELECT * FROM durable_articles_transfer_in WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE durable_articles SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $updatetransferin = "UPDATE durable_articles SET status = 5";
    $updatetransferin .= " WHERE id = $product_id";
    mysqli_query($conn, $updatetransferin) or die("Cannot update transfer_in: " . mysqli_error($conn));

    $updatetransferin = "UPDATE durable_articles_transfer_in SET document_no = '$document_no',";
    $updatetransferin .= " product_id = '$product_id', transfer_date = '$transfer_date', transfer_from = '$transfer_from', flag = '$flag'";
    $updatetransferin .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลการโอนเข้าครุภัณฑ์";
    logServer($conn, $log);

    mysqli_query($conn, $updatetransferin) or die("Cannot update transfer_in". mysqli_error($conn));
    header('Location: ../display_durable_articles_transfer_in.php?message=แก้ไขข้อมูลสำเร็จ');
}
