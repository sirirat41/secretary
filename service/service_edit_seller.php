<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //seller data
    $id = $_GET["id"];
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $fax = $_POST["fax"];
    $address = $_POST["address"];

    $updateSeller = "UPDATE seller SET name = '$name',";
    $updateSeller .= " tel = '$tel', fax = '$fax', address = '$address'";
    $updateSeller .= " WHERE id = $id";
    mysqli_query($conn, $updateSeller) or die("Cannot update seller: " . mysqli_error($conn));
    header('Location: ../display_seller.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>