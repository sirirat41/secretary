<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $document = $_POST["document_no"];
        $productId = $_POST["product_id"];
        $transferfrom =$_POST["transfer_from"];
        $transferdate = $_POST["transfer_date"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO durable_articles_transfer_in(document_no ,product_id ,transfer_from ,transfer_date, flag)";
        $sql .= " VALUES($document, $productId , '$transferfrom', '$transferdate', '$flag')"; 

        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_durable_articles_transfer_in.php?message=เพิ่มข้อมูลสำเร็จ');
            $sqlUpdate ="UPDATE durable_articles SET status = 5 WHERE id = $productid";
            mysqli_query($conn ,$sqlUpdate);
        } else {
            header('Location: ../display_durable_articles_transfer_in.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }
        
} else {


}
?>