<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $documentno = $_POST["document_no"];
    $productid = $_POST["product_id"];
    $receivedate = $_POST["receive_date"];
    $donatename = $_POST["donate_name"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_articles_donate(document_no, product_id, receive_date, donate_name, flag)";
    $sql .= " VALUES('$documentno', $productid, '$receivedate', '$donatename', '$flag')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}
header('Location: ../display_durable_articles_donate.php?message=เพิ่มข้อมูลสำเร็จ');

?>