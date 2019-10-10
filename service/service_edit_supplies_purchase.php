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

    $updatePurchase = "UPDATE supplies_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_date = '$receiveDate', receive_address = '$receiviceAddress'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));

    $log = "แก้ไขข้อมูลการจัดซื้อวัสดุสิ้นเปลือง รหัส " . $id ;
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
    $supplies_id = $_POST["supplies_id"];
    $billNo = $_POST["bill_no"];
    $departmentID = $_POST["department_id"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $articles_pattern = $_POST["articles_pattern"];

    $updateMaterial = "UPDATE supplies SET short_goverment = '$shortGoverment',";
    $updateMaterial .= " supplies_id = $supplies_id, bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateMaterial .= " seller_id = $sellerID , unit = $unit , price = $price , picture = '$imgeName'";
    $updateMaterial .= " WHERE id = $id";
    mysqli_query($conn, $updateMaterial) or die("Cannot update material" . mysqli_error($conn));
    header('Location: ../display_supplies.php?message=แก้ไขข้อมูลสำเร็จ');
}
