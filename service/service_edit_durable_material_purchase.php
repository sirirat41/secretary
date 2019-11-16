<?php
require 'connection.php';
if (isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $orderNo = $_POST["order_no"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receiveDate = $_POST["receive_date"];
    $receiviceAddress = $_POST["receive_address"];
    $document_no = $_POST["document_no"];

    $updatePurchase = "UPDATE durable_material_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_date = '$receiveDate', receive_address = '$receiviceAddress', document_no = '$document_no'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));

    $log = "แก้ไขข้อมูลการจัดซื้อวัสดุคงทน รหัส " . $id ;
    logServer($conn, $log);

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
    //material data
    $shortGoverment = $_POST["short_goverment"];
    $code = $_POST["code"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $billNo = $_POST["bill_no"];
    $departmentID = $_POST["department_id"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $durableYear = $_POST["durable_year"];
    $name = $_POST["name"];
    $assetNo = $_POST["asset_no"];

    $log = "แก้ไขข้อมูลการจัดซื้อวัสดุ รหัส " . $id ;
    logServer($conn, $log);

    $updateMaterial = "UPDATE durable_material SET short_goverment = '$shortGoverment',";
    $updateMaterial .= " code = '$code' , type = $type, attribute ='$attribute', bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateMaterial .= " seller_id = $sellerID , unit = $unit , price = $price , durable_year = $durableYear ,name = '$name', picture = '$imgeName',asset_no = '$assetNo'";
    $updateMaterial .= " WHERE id = $id";
    mysqli_query($conn, $updateMaterial) or die("Cannot update material" . mysqli_error($conn));
    header('Location: ../display_durable_material.php?message=แก้ไขข้อมูลสำเร็จ');
}
