<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["product_id"];
    $buyer = $_POST["buyer"];
    $selldate = $_POST["sell_date"];
    $documentno = $_POST["document_no"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_articles_sell(product_id, buyer, sell_date, document_no, flag)";
    $sql .= " VALUES($productid, '$buyer', '$selldate', '$documentno', '$flag')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../insert_durable_articles_sell.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_durable_articles_sell.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>