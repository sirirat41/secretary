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
    $number = $_POST["num"];
   

    $updatePurchase = "UPDATE supplies_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_date = '$receiveDate', number = number + $number, receive_address = '$receiviceAddress'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));

    $log = "แก้ไขข้อมูลการจัดซื้อวัสดุสิ้นเปลือง";
    logServer($conn, $log);

    $imgeName = $_POST["picture"];

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
    $billNo = $_POST["bill_no"];
    $departmentID = $_POST["department_id"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $articles_pattern = $_POST["articles_pattern"];
     

    $sqlSelect = "SELECT * FROM supplies_account_detail WHERE account_id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
   $stock = $dataOld["stock"];
 $receive = $number + $stock;

    $sqlInsertstock = "INSERT INTO supplies_account_detail(account_id, receive )";
    $sqlInsertstock .= " VALUES($id, $receive) ";
    
    // $sqlInsertstock = "UPDATE supplies_account_detail SET receive = $number + stock WHERE id = $id";
    mysqli_query($conn, $sqlInsertstock) or die(mysqli_error($conn));
  

    $updateMaterial = "UPDATE supplies SET short_goverment = '$shortGoverment',";
    $updateMaterial .= " bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateMaterial .= " seller_id = $sellerID , unit = $unit , price = $price , picture = '$imgeName'";
    $updateMaterial .= " WHERE id = $id";
    mysqli_query($conn, $updateMaterial) or die("Cannot update material" . mysqli_error($conn));
    header('Location: ../display_supplies.php?message=แก้ไขข้อมูลสำเร็จ');
}
