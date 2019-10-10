<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $productId = $_POST["product_id"];
    $damageDate = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $log = "แก้ไขข้อมูลการชำรุดวัสดุคงทน รหัส " . $id ;
    logServer($conn, $log);

    $updatePurchase = "UPDATE durable_material_damage SET product_id = '$productId',";
    $updatePurchase .= " damage_date = '$damageDate', flag = '$flag'";
    $updatePurchase .= " WHERE id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update damage: " . mysqli_error($conn));
    header('Location: ../display_durable_material_damage.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>