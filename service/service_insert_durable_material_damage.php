<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["product_id"];
    $damagedate = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_material_damage(product_id, damage_date, flag)";
    $sql .= " VALUES($productid, '$damagedate', '$flag')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_material_damage.php?message=เพิ่มข้อมูลสำเร็จ');
        $sqlUpdate ="UPDATE durable_material SET status = 3 WHERE id = $productid";
        mysqli_query($conn ,$sqlUpdate);
    } else {
        header('Location: ../display_durable_material_damage.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>