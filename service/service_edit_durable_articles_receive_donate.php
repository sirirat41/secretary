<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;

    //receive_donate data
    $documentno = $_POST["document_no"];
    $receivedate = $_POST["receive_date"];
    $donatename = $_POST["donate_name"];
    $number = $_POST["number"];
    $flag = $_POST["flag"];
    $updatereceivedonate = "UPDATE durable_articles_receive_donate SET document_no = '$documentno',";
    $updatereceivedonate .= " receive_date = '$receivedate', donate_name = '$donatename', number = $number, flag = '$flag' ";
    $updatereceivedonate .= " WHERE id = $id";
    
    if ($keyword != null) {
        $sql .= " and code like '%$keyword%'";
}


$data = array();
    mysqli_query($conn, $updatereceivedonate) or die("Cannot update receive_donate" . mysqli_error($conn));
    header('Location: ../display_durable_articles_receive_donate.php?message=แก้ไขข้อมูลสำเร็จ');

}
