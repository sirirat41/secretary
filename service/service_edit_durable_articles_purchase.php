<?php
require 'connection.php';
if (isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    
    $orderNo = $_POST["order_no"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $purchase_date = $_POST["purchase_date"];
    $receiviceAddress = $_POST["receive_address"];
    $document_no = $_POST["document_no"];

    $updatePurchase = "UPDATE durable_articles_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver',purchase_date = '$purchase_date', receive_address = '$receiviceAddress', document_no = '$document_no'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }

    //articles data
    $shortGoverment = $_POST["short_goverment"];
    $code = $_POST["code"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $model = $_POST["model"];
    $billNo = $_POST["bill_no"];
    $budget = $_POST["budget"];
    $departmentID = $_POST["department_id"];
    $assetNo = $_POST["asset_no"];
    $dGen = $_POST["d_gen"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $durableYear = $_POST["durable_year"];
    $storage = $_POST["storage"];
    $moneyType = $_POST["money_type"];
    $acquiring = $_POST["acquiring"];

    $log = "แก้ไขข้อมูลการจัดซื้อครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);

    $updateArticles = "UPDATE durable_articles SET short_goverment = '$shortGoverment',";
    $updateArticles .= " code = '$code' ,type = $type, attribute ='$attribute', model = '$model' , bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateArticles .= " asset_no = '$assetNo' , d_gen = '$dGen', seller_id = $sellerID , unit = $unit , price = $price ,";
    $updateArticles .= " durable_year = $durableYear , storage = '$storage' , money_type = '$moneyType' , acquiring = '$acquiring'";
    if($imgeName != ""){
         $updateArticles .= ", picture = '$imgeName'";

    }
   
    $updateArticles .= " WHERE id = $id";
    mysqli_query($conn, $updateArticles) or die("Cannot update articles" . mysqli_error($conn));
    header('Location: ../display_durable_articles.php?message=แก้ไขข้อมูลสำเร็จ');
}
