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
    $updatesell = "UPDATE durable_material_sell SET product_id = $productid,";
    $updatesell .= " buyer = '$buyer', sell_date = '$selldate', document_no = '$documentno', flag = '$flag' ";
    $updatesell .= " WHERE id = $id";
    mysqli_query($conn, $updatesell) or die("Cannot update sell" . mysqli_error($conn));
    header('Location: ../display_durable_material_sell.php?message=แก้ไขข้อมูลสำเร็จ');

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
