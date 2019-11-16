<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //receive_donate data
    $seq = $_POST["seq"];
    $repairdate = $_POST["repair_date"];
    $damageid = $_POST["damage_id"];
    $place = $_POST["place"];
    $flag = $_POST["flag"];

      
    $sqlSelect = "SELECT * FROM durable_material_repair WHERE id = $id";
    $resultOld = mysqli_query($conn, $sqlSelect);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $oldProductID = $dataOld["damage_id"];
    $updateOld = "UPDATE durable_material SET status = 1 WHERE id = $oldProductID";
    mysqli_query($conn, $updateOld);

    $updaterepair = "UPDATE durable_material SET status = 4";
    $updaterepair .= " WHERE id = $damageid";
    mysqli_query($conn, $updaterepair) or die("Cannot update repair: " . mysqli_error($conn));

    $updaterepair = "UPDATE durable_material_repair SET seq = $seq,";
    $updaterepair .= " repair_date = '$repairdate' , damage_id = '$damageid' , place = '$place' , flag = '$flag'";
    $updaterepair .= " WHERE id = $id";

    $log = "แก้ไขข้อมูลการซ่อมวัสดุคงทน รหัส " . $id ;
    logServer($conn, $log);
    
    mysqli_query($conn, $updaterepair) or die("Cannot update repair" . mysqli_error($conn));
    header('Location: ../display_durable_material_repair.php?message=แก้ไขข้อมูลสำเร็จ');

}
