<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $damage_id = $_POST["damage_id"];
    $seq = $_POST["seq"];
    $repair_date = $_POST["repair_date"];
    $place = $_POST["place"];
    $updatepermit = "UPDATE durable_material_repair SET seq = $seq ,";
    $updatepermit .= " repair_date = '$repair_date', place = '$place'";
    $updatepermit .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลการซ่อมวัสดุคงทน รหัส " . $id ;
    logServer($conn, $log);

    mysqli_query($conn, $updatepermit) or die("Cannot update repair". mysqli_error($conn));
    header('Location: ../display_durable_material_repair.php?message=แก้ไขข้อมูลสำเร็จ');
}