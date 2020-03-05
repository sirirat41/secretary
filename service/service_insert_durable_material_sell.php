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

    $log = "เพิ่มข้อมูลการขายทอดตลาดวัสดุงคงทน ";
    logServer($conn, $log);
    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_material_sell.php?message=เพิ่มข้อมูลสำเร็จ');
        $sqlUpdate ="UPDATE durable_material SET status = 9 WHERE id = $productId";
        mysqli_query($conn ,$sqlUpdate);

        $sqlUpdate ="UPDATE durable_material_damage SET status = 0 WHERE product_id = $productid";
        mysqli_query($conn ,$sqlUpdate);
    } else {
        header('Location: ../display_durable_material_sell.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>