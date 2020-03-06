<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["purchase_id"] )) {
    $purchaseID = $_POST["purchase_id"];
    $sqlSelect = "SELECT * FROM durable_material_purchase WHERE id = " . $purchaseID;
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $dataSelect = mysqli_fetch_assoc($resultSelect);
    $documentNo = $dataSelect["document_no"];
    $orderNo = $dataSelect["order_no"];

    $sqlFind = "SELECT * FROM durable_material_purchase WHERE document_no ='$documentNo' and order_no = '$orderNo'";
    $resultFind = mysqli_query($conn, $sqlFind);
    while ($row = mysqli_fetch_assoc($resultFind)) {
        $sqlDrop = "UPDATE durable_material SET status = 0 WHERE id = " . $row["product_id"];
        mysqli_query($conn, $sqlDrop);
    }


    $sqlUpdate ="UPDATE durable_material_purchase SET status = 0 WHERE document_no = '$documentNo' and order_no = '$orderNo'";

    $log = "ยกเลิกข้อมูลการจัดซื้อวัสดุคงทน";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material_purchase.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_purchase.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_material_purchase.php?message=ข้อมูลผิดพลาด');
}

?>