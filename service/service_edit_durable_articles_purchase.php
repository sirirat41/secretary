<?php
<<<<<<< HEAD
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
=======
require "connection.php";
if (isset($_GET["id"])) {
    // purchase data
    $id = $_GET["id"];
>>>>>>> 17fdbd48730b2f2fb42af76604fd3949547e45c0
    $orderNo = $_POST["order_no"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receiveAddress = $_POST["receive_address"];
    $updatepurchase = "UPDATE durable_articles_purchase SET order_no = '$orderNo',";
    $updatepurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_address = '$receiveAddress'";
    $updatepurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatepurchase) or die("Cannot update purchase" . mysqli_error($conn));

<<<<<<< HEAD
    //articles data
    $shortGoverment = $_POST["short_goverment"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $model = $_POST["model"];
    $billNo = $_POST["bill_no"];
    $budget = $_POST["budget"];
    $departmentID = $_POST["department_id"];
=======


    // articles data
    $shortGoverment = $_POST["short_goverment"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $model = $_POST["model"]; 
    $billNo = $_POST["bill_no"];
    $budget = $_POST["budget"];
    $departmentID = $_POST["department_id"];; 
>>>>>>> 17fdbd48730b2f2fb42af76604fd3949547e45c0
    $assetNo = $_POST["asset_no"];
    $dGen = $_POST["d_gen"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $durableYear = $_POST["durable_year"];
    $storage = $_POST["storage"];
    $moneyType = $_POST["money_type"];
    $acquiring = $_POST["acquiring"];
<<<<<<< HEAD
    $updatearticles = "UPDATE durable_articles SET short_goverment ='$shortGoverment', type = $type, attribute = '$attribute',model = '$model', ";
    $updatearticles .= " bill_no = '$billNo', budget = '$budget', department_id = $departmentID, asset_no = '$assetNo', d_gen = '$dGen', ";
    $updatearticles .= " seller_id = $sellerID, unit = $unit, price = $price, durable_year = $durableYear, storage = '$storage', money_type = '$moneyType', ";
    $updatearticles .= " acquiring = '$acquiring' ";
    $updatearticles .= " WHERE id = $id";
    mysqli_query($conn, $updatearticles) or die("Cannot update articles". mysqli_error($conn));
    header('Location: ../display_durable_articles.php?message=แก้ไขข้อมูลสำเร็จ');
}
=======
    $updatearticles = "UPDATE durable_articles SET short_goverment ='$shortGoverment',";
    $updatearticles .= " short_goverment = '$shortGoverment', type = $type, attribute = '$attribute', model = '$model',bill_no = '$billNo', budget = '$budget', department_id = $departmentID, asset_No = '$assetNo', d_gen = '$dGen', seller_id = $sellerID, unit = $unit,  price = $price, durable_year = $durableYear, storage = '$storage', money_type = '$moneyType', acquiring = '$acquiring'";
    $updatearticles .= " WHERE id = $id";
    mysqli_query($conn, $updatearticles) or die("Cannot update articles" . mysqli_error($conn));
    header('Location: ../display_durable_articles.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>
>>>>>>> 17fdbd48730b2f2fb42af76604fd3949547e45c0
