<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //donate data
    $id = $_GET["id"];
    $documentNo = $_POST["document_no"];
    $receiveDate = $_POST["receive_date"];
    $productId = $_POST["product_id"];
    $donateName = $_POST["donate_name"];
    $flag = $_POST["flag"];

    $log = "แก้ไขข้อมูลการบริจาคครุภัณฑ์";
    logServer($conn, $log);
    
    $sqlSelect = "SELECT * FROM durable_articles_donate WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE durable_articles SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);
    
    $updateDonate = "UPDATE durable_articles SET status = 8";
    $updateDonate .= " WHERE id = $productId";
    mysqli_query($conn, $updateDonate) or die("Cannot update damage: " . mysqli_error($conn));

    $updateDonate = "UPDATE durable_articles_donate SET document_no = '$documentNo',";
    $updateDonate .= " product_id = $productId, receive_date = '$receiveDate', ";
    $updateDonate .= " donate_name = '$donateName', flag = '$flag'";
    $updateDonate .= " WHERE id = $id";
    mysqli_query($conn, $updateDonate) or die("Cannot update donate: " . mysqli_error($conn));

    header('Location: ../display_durable_articles_donate.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>