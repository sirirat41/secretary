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
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>