<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $bookno = $_POST["book_no"];
        $permitdate = $_POST["permit_date"];
        $receivedate = $_POST["receive_date"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO durable_articles_permits(product_id ,book_no ,permit_date ,receive_date, flag)";
        $sql .= " VALUES($productId, '$bookno' , '$permitdate', '$receivedate', '$flag')"; 

        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_articles_permits.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_articles_permits.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>