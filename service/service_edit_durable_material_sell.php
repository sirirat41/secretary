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

    $log = "แก้ไขข้อมูลการขายทอดตลาดวัสดุคงทน  รหัส " . $id ;
    logServer($conn, $log);

       
    $sqlSelect = "SELECT * FROM durable_material_sell WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE durable_material SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $updatesell = "UPDATE durable_material SET status = 9";
    $updatesell .= " WHERE id = $productid";
    mysqli_query($conn, $updatesell) or die("Cannot update sell: " . mysqli_error($conn));

    $updatesell = "UPDATE durable_material_sell SET buyer = '$buyer',";
    $updatesell .= " product_id = '$productid', sell_date = '$selldate', document_no = '$documentno', flag = '$flag' ";
    $updatesell .= " WHERE id = $id";
    mysqli_query($conn, $updatesell) or die("Cannot update sell" . mysqli_error($conn));
    header('Location: ../display_durable_material_sell.php?message=แก้ไขข้อมูลสำเร็จ');

}
