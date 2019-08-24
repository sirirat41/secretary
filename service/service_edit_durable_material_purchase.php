<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $orderNo = $_POST["order_no"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receiveDate = $_POST["receive_date"];
    $receiviceAddress = $_POST["receive_address"];

    $updatePurchase = "UPDATE durable_material_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_date = '$receiveDate', receive_address = '$receiviceAddress'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));


    //material data
    $shortGoverment = $_POST["short_goverment"];
    $type = $_POST["type"];
    $name = $_POST["name"];
    $attribute =$_POST["attribute"];
    $billNo = $_POST["bill_no"];
    $departmentID = $_POST["department_id"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $durableYear = $_POST["durable_year"];

    $updateMaterial = "UPDATE durable_material SET short_goverment = '$shortGoverment',";
    $updateMaterial .= " type = $type, attribute ='$attribute', bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateMaterial .= " seller_id = $sellerID , unit = $unit , price = $price , durable_year = $durableYear";
    $updateMaterial .= " WHERE id = $id";
    mysqli_query($conn, $updateArticl) or die("Cannot update material" . mysqli_error($conn));
    header('Location: ../display_durable_material.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>