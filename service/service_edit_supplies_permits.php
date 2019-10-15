<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $product_id = $_POST["product_id"];
    $book_no = $_POST["book_no"];
    $permit_date = $_POST["permit_date"];
    $receivedate = $_POST["receive_date"];
    $flag = $_POST["flag"];
    $updatepermit = "UPDATE supplies_permits SET book_no = '$book_no',";
    $updatepermit .= " permit_date = '$permit_date', receive_date = '$receivedate', flag = '$flag'";
    $updatepermit .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลการยืม-คืนวัสดุสิ้นเปลือง รหัส " . $id ;
    logServer($conn, $log);

  
    mysqli_query($conn, $updatepermit) or die("Cannot update permits". mysqli_error($conn));
    header('Location: ../display_supplies_permits.php?messagee=แก้ไขข้อมูลสำเร็จ');
}
