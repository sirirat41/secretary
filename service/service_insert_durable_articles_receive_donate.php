<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $documentno = $_POST["document_no"];
    $productid = $_POST["product_id"];
    $receivedate = $_POST["receive_date"];
    $donatename = $_POST["donate_name"];
    $number = $_POST["number"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_articles_receive_donate(`document_no`, product_id, `receive_date`, `donate_name`, number, `flag`)";
    $sql .= " VALUES('$documentno', $productid, '$receivedate', '$donatename', $number, '$flag')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../insert_durable_articles_receive_donate.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_durable_articles_receive_donate.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>