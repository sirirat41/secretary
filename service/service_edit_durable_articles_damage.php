<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $productId = $_POST["product_id"];
    $damageDate = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $updatePurchase = "UPDATE durable_articles_damage SET product_id = '$productId',";
    $updatePurchase .= " damage_date = '$damageDate', flag = '$flag'";
    $updatePurchase .= " WHERE id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update damage: " . mysqli_error($conn));
    header('Location: ../display_durable_articles_damage.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>