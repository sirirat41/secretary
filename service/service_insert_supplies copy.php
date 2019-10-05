<?php
require "connection.php";
//Supplies
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"]; 
    $type = $_POST["type"]; 
    $attribute = $_POST["attribute"]; 
    $name = $_POST["name"]; 
    $departmentid = $_POST["department_id"]; 
    $sellerid = $_POST["seller_id"]; 
    $price = $_POST["price"]; 
    $billno = $_POST["bill_no"]; 
    $goverment = "สำนักงานตำรวจแห่งชาติ"; 
    $shortgoverment = $_POST["short_goverment"]; 
    $unit = $_POST["unit"]; 
    $suppliesPattern = $_POST["supplies_pattern"];
    $status = 1; 

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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


    
    $sql = "SELECT * FROM supplies as s WHERE s.id = $id and p.product_id = s.id ";
    $result = mysqli_query($conn, $sql) or die('cannot select data');

    for ($i = 0; $i < $number; $i++) {
    

        $sqlInsertSupplies = "INSERT INTO supplies(code, seq, type, attribute, name, department_id,";
        $sqlInsertSupplies .= " seller_id, price, bill_no, goverment, short_goverment, unit, status, picture)";
        $sqlInsertSupplies .= " VALUES('$newCode', $seq, $type, '$attribute',  '$name', $departmentid, ";
        $sqlInsertSupplies .= " $seller_id, $price, '$billno', '$goverment', '$shortgoverment', $unit, $status,'$imgeName')";
        
        mysqli_query($conn, $sqlInsertSupplies) or die(mysqli_error($conn));
        $productID = mysqli_insert_id($conn);

        $sqlInsertPurchase = "INSERT INTO supplies_purchase(product_id, order_no, purchase_date, seller_id,";
        $sqlInsertPurchase .= "order_by, receiver, receive_date, receive_address, number, status)";
        $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date', $seller_id, ";
        $sqlInsertPurchase .= " '$order_by', '$receiver', '$receive_date', '$receive_address', $number, $status)";

        mysqli_query($conn, $sqlInsertPurchase) or die(mysqli_error($conn));
    }

    header('location: ../display_supplies.php');
} else {
    header('location: ../display_supplies.php');

}
