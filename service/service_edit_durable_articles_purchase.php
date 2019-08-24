<<<<<<< HEAD
<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $orderNo = $_POST["order_no"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receiviceAddress = $_POST["receive_address"];

    $updatePurchase = "UPDATE durable_articles_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_address = '$receiviceAddress'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));

=======
<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $orderNo = $_POST["order_no"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receiveAddress = $_POST["receive_address"];
    $updatepurchase = "UPDATE durable_articles_purchase SET order_no = '$orderNo',";
    $updatepurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_address = '$receiveAddress'";
    $updatepurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatepurchase) or die("Cannot update purchase" . mysqli_error($conn));
>>>>>>> 9d193602c03d577c57e3c7fa984239ddc6b1f3a5

    //articles data
    $shortGoverment = $_POST["short_goverment"];
    $type = $_POST["type"];
<<<<<<< HEAD
    $attribute =$_POST["attribute"];
    $model = $_POST["model"];
    $billNo = $_POST["bill_no"];
    $budget =$_POST["budget"];
=======
    $attribute = $_POST["attribute"];
    $model = $_POST["model"];
    $billNo = $_POST["bill_no"];
    $budget = $_POST["budget"];
>>>>>>> 9d193602c03d577c57e3c7fa984239ddc6b1f3a5
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
<<<<<<< HEAD

    $updateArticl = "UPDATE durable_articles SET short_goverment = '$shortGoverment',";
    $updateArticl .= " type = $type, attribute ='$attribute', model = '$model' , bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateArticl .= " asset_no = '$assetNo' , d_gen = '$dGen', seller_id = $sellerID , unit = $unit , price = $price ,";
    $updateArticl .= " durable_year = $durableYear , storage = '$storage' , money_type = '$moneyType' , acquiring = '$acquiring'";
    $updateArticl .= " WHERE id = $id";
    mysqli_query($conn, $updateArticl) or die("Cannot update articles" . mysqli_error($conn));
    header('Location: ../display_durable_articles.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>
=======
    $updatearticles = "UPDATE durable_articles SET short_goverment ='$shortGoverment', type = $type, attribute = '$attribute',model = '$model', ";
    $updatearticles .= " bill_no = '$billNo', budget = '$budget', department_id = $departmentID, asset_no = '$assetNo', d_gen = '$dGen', ";
    $updatearticles .= " seller_id = $sellerID, unit = $unit, price = $price, durable_year = $durableYear, storage = '$storage', money_type = '$moneyType', ";
    $updatearticles .= " acquiring = '$acquiring' ";
    $updatearticles .= " WHERE id = $id";
    mysqli_query($conn, $updatearticles) or die("Cannot update articles". mysqli_error($conn));
    header('Location: ../display_durable_articles.php?message=แก้ไขข้อมูลสำเร็จ');
}
>>>>>>> 9d193602c03d577c57e3c7fa984239ddc6b1f3a5
