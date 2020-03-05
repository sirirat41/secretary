<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $product_id = $_POST["product_id"];
    $document_no = $_POST["document_no"];
    $transfer_date = $_POST["transfer_date"];
    $transfer_to = $_POST["transfer_to"];
    $flag = $_POST["flag"];
       
    $sqlSelect = "SELECT * FROM durable_material_transfer_out WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE  durable_material SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $updatetransferout = "UPDATE  durable_material SET status = 6";
    $updatetransferout .= " WHERE id = $product_id";
    mysqli_query($conn, $updatetransferout) or die("Cannot update transfer_out: " . mysqli_error($conn));

    $updatetransferout = "UPDATE durable_material_transfer_out SET document_no = '$document_no',";
    $updatetransferout .= " product_id = '$product_id', transfer_date = '$transfer_date', transfer_to = '$transfer_to', flag = '$flag'";
    $updatetransferout .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลการโอนเข้าครุภัณฑ์";
    logServer($conn, $log);

    mysqli_query($conn, $updatetransferout) or die("Cannot update transfer_out". mysqli_error($conn));
    header('Location: ../display_durable_material_transfer_out.php?message=แก้ไขข้อมูลสำเร็จ');
}
