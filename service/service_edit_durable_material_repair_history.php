<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //receive_donate data
    $seq = $_POST["seq"];
    $repairid = $_POST["repair_id"];
    $price = $_POST["price"];
    $receivedate = $_POST["receive_date"];
    $fix = $_POST["fix"];
    $flag = $_POST["flag"];
    $updaterepairhistory = "UPDATE durable_material_repair_history SET seq = $seq,";
    $updaterepairhistory .= " repair_id = $repairid, price = $price, receive_date = '$receivedate', fix = '$fix', flag = '$flag' ";
    $updaterepairhistory .= " WHERE id = $id";
    mysqli_query($conn, $updaterepairhistory) or die("Cannot update repair_history" . mysqli_error($conn));
    header('Location: ../display_durable_material_repair_history.php?message=แก้ไขข้อมูลสำเร็จ');

    //material data
    // $shortGoverment = $_POST["short_goverment"];
    // $type = $_POST["type"];
    // $attribute = $_POST["attribute"];
    // $model = $_POST["model"];
    // $billNo = $_POST["bill_no"];
    // $budget = $_POST["budget"];
    // $departmentID = $_POST["department_id"];
    // $assetNo = $_POST["asset_no"];
    // $dGen = $_POST["d_gen"];
    // $sellerID = $_POST["seller_id"];
    // $unit = $_POST["unit"];
    // $price = $_POST["price"];
    // $durableYear = $_POST["durable_year"];
    // $storage = $_POST["storage"];
    // $moneyType = $_POST["money_type"];
    // $acquiring = $_POST["acquiring"];
    // $updatematerial = "UPDATE durable_material SET short_goverment ='$shortGoverment', type = $type, attribute = '$attribute',model = '$model', ";
    // $updatematerial .= " bill_no = '$billNo', budget = '$budget', department_id = $departmentID, asset_no = '$assetNo', d_gen = '$dGen', ";
    // $updatematerial .= " seller_id = $sellerID, unit = $unit, price = $price, durable_year = $durableYear, storage = '$storage', money_type = '$moneyType', ";
    // $updatematerial .= " acquiring = '$acquiring' ";
    // $updatematerial .= " WHERE id = $id";
    // mysqli_query($conn, $updatematerial) or die("Cannot update material". mysqli_error($conn));
}
