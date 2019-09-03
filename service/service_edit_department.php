<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $fullname = $_POST["fullname"];
    $shortname = $_POST["shortname"];
    $owner = $_POST["owner"];
    $bulding = $_POST["bulding"];
    $floor = $_POST["floor"];

    $updatePurchase = "UPDATE department SET fullname = '$fullname',";
    $updatePurchase .= " shortname = '$shortname', owner = '$owner' , bulding = $bulding , floor = $floor";
    $updatePurchase .= " WHERE id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update department: " . mysqli_error($conn));
    header('Location: ../display_department.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>