<?php
require "connection.php";
//Supplies
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $number = $_POST["number"];
    $code = $_POST["code"];
    $supplies_id = $_POST["supplies_id"];
    $departmentid = $_POST["department_id"];
    $sellerid = $_POST["seller_id"];
    $price = $_POST["price"];
    $billno = $_POST["bill_no"];
    $goverment = "สำนักงานตำรวจแห่งชาติ";
    $shortgoverment = $_POST["short_goverment"];
    $unit = $_POST["unit"];
    $suppliesPattern = $_POST["supplies_pattern"];
    $status = 1;

    $log = "เพิ่มข้อมูลวัสดุสิ้นเปลือง ";
    logServer($conn, $log);

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }

    //purchase
    $order_no = $_POST["order_no"];
    $purchase_date = $_POST["purchase_date"];
    $seller_id = $_POST["seller_id"];
    $order_by = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receive_date = $_POST["receive_date"];
    $receive_address = $_POST["receive_address"];


    $sqlInsertSupplies = "INSERT INTO supplies(code, supplies_id , department_id,";
    $sqlInsertSupplies .= " seller_id, price, bill_no, goverment, short_goverment, unit, status, picture)";
    $sqlInsertSupplies .= " VALUES('$code', $supplies_id, $departmentid, ";
    $sqlInsertSupplies .= " $seller_id, $price, '$billno', '$goverment', '$shortgoverment', $unit, $status,'$imgeName')";

    mysqli_query($conn, $sqlInsertSupplies) or die(mysqli_error($conn));
    $productID = mysqli_insert_id($conn);

    $sqlInsertPurchase = "INSERT INTO supplies_purchase(product_id, order_no, purchase_date, seller_id,";
    $sqlInsertPurchase .= "order_by, receiver, receive_date, receive_address, number, status)";
    $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date', $seller_id, ";
    $sqlInsertPurchase .= " '$order_by', '$receiver', '$receive_date', '$receive_address', $number, $status)";

    mysqli_query($conn, $sqlInsertPurchase) or die(mysqli_error($conn));


    $sqlUpdate = "UPDATE supplies_stock SET stock = stock + $number WHERE id = $supplies_id";
    mysqli_query($conn, $sqlUpdate);
    header('location: ../display_supplies.php');
} else {
    header('location: ../display_supplies.php');
}
