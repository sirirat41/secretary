<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["purchase_id"] )) {
    $purchaseID = $_POST["purchase_id"];
    $sqlSelect = "SELECT * FROM supplies_purchase WHERE id = " . $purchaseID;
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $dataSelect = mysqli_fetch_assoc($resultSelect);
    $documentNo = $dataSelect["document_no"];
    $orderNo = $dataSelect["order_no"];

    $sqlFind = "SELECT * FROM supplies_purchase WHERE document_no ='$documentNo' and order_no = '$orderNo'";
    $resultFind = mysqli_query($conn, $sqlFind);
    while ($row = mysqli_fetch_assoc($resultFind)) {
        $sqlDrop = "UPDATE supplies SET status = 1 WHERE id = " . $row["product_id"];
        mysqli_query($conn, $sqlDrop);
    }


    $sqlUpdate ="UPDATE supplies_purchase SET status = 1 WHERE id = " . $purchaseID;

    $log = "กู้คืนข้อมูลการจัดซื้อวัสดุสิ้นเปลือง";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_supplies_purchase.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_supplies_purchase.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../rowback_supplies_purchase.php?message=ข้อมูลผิดพลาด');
}

?>