<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $fullname = $_POST["fullname"];
    $shortname = $_POST["shortname"];
    $fax = $_POST["fax"];
    $bulding = $_POST["bulding"];
    $floor = $_POST["floor"];

    $target_dir = "../depart/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    }

    $updatePurchase = "UPDATE department SET fullname = '$fullname',";
    $updatePurchase .= " shortname = '$shortname', fax = '$fax' , bulding = '$bulding' , floor = '$floor' ,pic = '$imgeName'";
    $updatePurchase .= " WHERE id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update department: " . mysqli_error($conn));
    header('Location: ../display_department.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>