<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : null;
    //purchase data
    $product_id = $_POST["product_id"];
    $book_no = $_POST["book_no"];
    $permit_date = $_POST["permit_date"];
    $receivedate = $_POST["receive_date"];
    $department_id = $_POST["department_id"];
    $flag = $_POST["flag"];
    
    $log = "แก้ไขข้อมูลการยืม-คืนครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);

    $updatepermit = "UPDATE durable_articles_permits SET product_id = '$product_id',";
    $updatepermit .= " book_no = '$book_no', permit_date = '$permit_date', receive_date = '$receivedate', department_id = $department_id, flag = '$flag'";
    $updatepermit .= " WHERE id = $id";
  
        if ($keyword != null) {
                $sql .= " and code like '%$keyword%'";
        }

        
        $data = array();
    mysqli_query($conn, $updatepermit ,$sql) or die("Cannot update permits". mysqli_error($conn));
    header('Location: ../display_durable_articles_permits.php?message=แก้ไขข้อมูลสำเร็จ');
}
