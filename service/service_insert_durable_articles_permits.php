<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $bookno = $_POST["book_no"];
        $permitdate = $_POST["permit_date"];
        $receivedate = $_POST["receive_date"];
        $department_id = $_POST["department_id"];
        $flag = $_POST["flag"];

        $sql = "INSERT INTO durable_articles_permits(product_id ,book_no ,permit_date ,receive_date,department_id, flag)";
        $sql .= " VALUES($productId, '$bookno' , '$permitdate', '$receivedate', $department_id, '$flag')"; 

        $log = "เพิ่มข้อมูลการยืม-คืนครุภัณฑ์";
        logServer($conn, $log);
        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_durable_articles_permits.php?message=เพิ่มข้อมูลสำเร็จ');
            $sqlUpdate ="UPDATE durable_articles SET status = 2 WHERE id = $productId";
            mysqli_query($conn ,$sqlUpdate);
        } else {
            header('Location: ../display_durable_articles_permits.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
