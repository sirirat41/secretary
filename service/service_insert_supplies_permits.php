<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $bookno = $_POST["book_no"];
        $permitdate = $_POST["permit_date"];
        $receivedate = $_POST["receive_date"];
        $number = $_POST["number"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO supplies_permits(product_id ,book_no ,permit_date ,receive_date,number, flag)";
        $sql .= " VALUES($productId, '$bookno' , '$permitdate', '$receivedate','$number', '$flag')"; 

        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_supplies_permits.php?message=เพิ่มข้อมูลสำเร็จ');
            $sqlUpdate ="UPDATE supplies SET status = 2 WHERE id = $productid";
            mysqli_query($conn ,$sqlUpdate);
        } else {
            header('Location: ../display_supplies_permits.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>