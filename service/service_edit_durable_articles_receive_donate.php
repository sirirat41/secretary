<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //receive_donate data
    $documentno = $_POST["document_no"];
    $receivedate = $_POST["receive_date"];
    $donatename = $_POST["donate_name"];
    $number = $_POST["number"];
    $flag = $_POST["flag"];
    $updatereceivedonate = "UPDATE durable_articles_receive_donate SET document_no = '$documentno',";
    $updatereceivedonate .= " receive_date = '$receivedate', donate_name = '$donatename', number = $number, flag = '$flag' ";
    $updatereceivedonate .= " WHERE id = $id";
    mysqli_query($conn, $updatereceivedonate) or die("Cannot update receive_donate" . mysqli_error($conn));
    header('Location: ../display_durable_articles_receive_donate.php?message=แก้ไขข้อมูลสำเร็จ');

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
