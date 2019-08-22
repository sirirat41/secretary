<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //receive_donate data
    $seq = $_POST["seq"];
    $receivedate = $_POST["receive_date"];
    $damageid = $_POST["damage_id"];
    $fix = $_POST["fix"];
    $updaterepairhistory = "UPDATE durable_articles_repair_history SET seq = $seq,";
    $updaterepairhistory .= " receive_date = '$receivedate', damage_id = $damageid, fix = '$fix' ";
    $updaterepairhistory .= " WHERE id = $id";
    mysqli_query($conn, $updaterepairhistory) or die("Cannot update repair_history" . mysqli_error($conn));
    header('Location: ../display_durable_articles_repair_history.php?message=แก้ไขข้อมูลสำเร็จ');

    //articles data
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
    // $updatearticles = "UPDATE durable_articles SET short_goverment ='$shortGoverment', type = $type, attribute = '$attribute',model = '$model', ";
    // $updatearticles .= " bill_no = '$billNo', budget = '$budget', department_id = $departmentID, asset_no = '$assetNo', d_gen = '$dGen', ";
    // $updatearticles .= " seller_id = $sellerID, unit = $unit, price = $price, durable_year = $durableYear, storage = '$storage', money_type = '$moneyType', ";
    // $updatearticles .= " acquiring = '$acquiring' ";
    // $updatearticles .= " WHERE id = $id";
    // mysqli_query($conn, $updatearticles) or die("Cannot update articles". mysqli_error($conn));
}
