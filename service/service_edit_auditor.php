<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $rank = $_POST["rank"];
    $Aname = $_POST["Aname"];
    $position = $_POST["position"];

    $log = "แก้ไขข้อมูลผู้ตรวจสอบ";
    logServer($conn, $log);

    

    $updatePurchase = "UPDATE auditor SET rank = '$rank',";
    $updatePurchase .= " Aname = '$Aname', position = '$position'";
    $updatePurchase .= " WHERE id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update auditor: " . mysqli_error($conn));
    header('Location: ../edit_auditor.php?id=1&message=แก้ไขข้อมูลสำเร็จ');
}
?>