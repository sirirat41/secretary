<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $orderno = $_POST["order_no"];
        $purchasedate = $_POST["purchase_date"];
        $sellerid = $_POST["seller_id"];
        $orderby = $_POST["order_by"];
        $receiver = $_POST["receiver"];
        $receivedate = $_POST["receive_date"];
        $receiveaddress = $_POST["receive_address"];
        $number = $_POST["number"];
        $document_no = $_POST["document_no"];

        $sql = "INSERT INTO durable_material_purchase(product_id ,order_no ,purchase_date ,seller_id ,order_by ,receiver ,receive_date ,receive_address ,number, document_no)";
        $sql .= " VALUES($productId ,'$orderno' ,'$purchasedate' ,$sellerid ,'$orderby' ,'$receiver' ,'$receivedate' ,'$receiveaddress' ,$number, '$document_no')"; 

        $log = "เพิ่มข้อมูลการจัดซื้อวัสดุคงทน";
        logServer($conn, $log);
        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_durable_material_purchase.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_durable_material_purchase.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
    
    } else {
    
    }
?>