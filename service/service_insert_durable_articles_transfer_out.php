<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $document = $_POST["document_no"];
        $productId = $_POST["product_id"];
        $transferto =$_POST["transfer_to"];
        $transferdate = $_POST["transfer_date"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO durable_articles_transfer_out(document_no ,product_id ,transfer_to ,transfer_date, flag)";
        $sql .= " VALUES($document, $productId , '$transferto', '$transferdate', '$flag')"; 

        
        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_articles_transfer_out.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_articles_transfer_out.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>