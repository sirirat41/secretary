<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["product_id"];
    $buyer = $_POST["buyer"];
    $selldate = $_POST["sell_date"];
    $documentno = $_POST["document_no"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_material_sell(product_id, buyer, sell_date, document_no, flag)";
    $sql .= " VALUES($productid, '$buyer', '$selldate', '$documentno', '$flag')";

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>