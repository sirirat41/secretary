<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $productId = $_POST["product_id"];
    $damageDate = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $sqlSelect = "SELECT * FROM durable_material_damage WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["product_id"];
    $updateOld = "UPDATE durable_material SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $log = "แก้ไขข้อมูลการชำรุดวัสดุคงทน";
    logServer($conn, $log);

    $updatePurchase = "UPDATE durable_material SET status = 3";
    $updatePurchase .= " WHERE id = $productId";
    mysqli_query($conn, $updatePurchase) or die("Cannot update damage: " . mysqli_error($conn));

    $updatePurchase = "UPDATE durable_material_damage SET damage_date = '$damageDate',";
    $updatePurchase .= " product_id = $productId, flag = '$flag'";
    $updatePurchase .= " WHERE id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update damage: " . mysqli_error($conn));
    header('Location: ../display_durable_material_damage.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>