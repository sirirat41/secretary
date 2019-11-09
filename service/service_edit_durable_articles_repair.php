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

    
    $updaterepair = "UPDATE durable_articles_repair SET seq = $seq,";
    $updaterepair .= " repair_date = '$repairdate' , place = '$place' , flag = '$flag'";
    $updaterepair .= " WHERE id = $id";

    $log = "แก้ไขข้อมูลการซ่อมครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);
    
    mysqli_query($conn, $updaterepair) or die("Cannot update repair" . mysqli_error($conn));
    header('Location: ../display_durable_articles_repair.php?message=แก้ไขข้อมูลสำเร็จ');

}
