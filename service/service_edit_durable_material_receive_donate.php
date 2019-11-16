<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;

    //receive_donate data
    $product_id = $_POST["product_id"];
    $documentno = $_POST["document_no"];
    $receivedate = $_POST["receive_date"];
    $donatename = $_POST["donate_name"];
    $number = $_POST["number"];
    $flag = $_POST["flag"];

    $log = "แก้ไขข้อมูลการรับบริจาควัสดุ รหัส " . $id ;
    logServer($conn, $log);

    
    $sqlSelect = "SELECT * FROM durable_material_receive_donate WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE durable_material SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $updatereceivedonate = "UPDATE durable_material SET status = 7";
    $updatereceivedonate .= " WHERE id = $product_id";
    mysqli_query($conn, $updatereceivedonate) or die("Cannot update receive_donate: " . mysqli_error($conn));

    $updatereceivedonate = "UPDATE durable_material_receive_donate SET document_no = '$documentno',";
    $updatereceivedonate .= " product_id = '$product_id', receive_date = '$receivedate', donate_name = '$donatename', number = $number, flag = '$flag' ";
    $updatereceivedonate .= " WHERE id = $id";
    
    if ($keyword != null) {
        $sql .= " and code like '%$keyword%'";
}


$data = array();
    mysqli_query($conn, $updatereceivedonate) or die("Cannot update receive_donate" . mysqli_error($conn));
    header('Location: ../display_durable_material_receive_donate.php?message=แก้ไขข้อมูลสำเร็จ');

}
